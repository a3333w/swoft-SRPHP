<?php
/**
 * 微信支付帮助库
 * ====================================================
 * 接口分三种类型：
 * 【请求型接口】--Wxpay_client_
 * 		统一支付接口类--UnifiedOrder_micropay
 * 		订单查询接口--OrderQuery_micropay
 * 		退款申请接口--Refund_micropay
 * 		退款查询接口--RefundQuery_micropay
 * 		对账单接口--DownloadBill_micropay
 * 		冲正接口--Reverser_micropay
 * 		被扫支付--MicropayCall
 * =====================================================
 * 【CommonUtil】常用工具：
 * 		trimString()，设置参数时需要用到的字符处理函数
 * 		createNoncestr()，产生随机字符串，不长于32位
 * 		formatBizQueryParaMap(),格式化参数，签名过程需要用到
 * 		getSign(),生成签名
 * 		arrayToXml(),array转xml
 * 		xmlToArray(),xml转 array
 * 		postXmlCurl(),以post方式提交xml到对应的接口url
 * 		postXmlSSLCurl(),使用证书，以post方式提交xml到对应的接口url
*/
namespace App\Utils\Payments;

class Weipay {
	public function __construct() {	
		
		//=======【基本信息设置】=====================================
		//微信公众号身份的唯一标识。审核通过后，在微信发送的邮件中查看
		//$this->config['APPID'] = 'wx8888888888888888';
		//受理商ID，身份标识
		//$this->config['MCHID'] = '18888887';
		//商户支付密钥Key。审核通过后，在微信发送的邮件中查看
		//$this->config['KEY'] = '48888888888888888888888888888886';
		//=======【证书路径设置】=====================================
		//证书路径,注意必须填写绝对路径
		//$this->config['SSLCERT_PATH'] = dirname(__FILE__).'\\cacert\\weipay\\apiclient_cert.pem';
		//$this->config['SSLKEY_PATH'] = dirname(__FILE__).'\\cacert\\weipay\\apiclient_key.pem';
		//$this->config['JS_API_CALL_URL'] ='http://www.xxxxxx.com/demo/js_api_call.php';
		//$this->config['NATIVE_API_CALL_URL'] =APP_PATH.'cart/init.html?step=response_get&code=Weipay';
  
		//=======【curl超时设置】===================================
		//本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
		$this->config['CURL_TIMEOUT'] = 30;
		$this->config['gateway_method']='js';
		$this->config['APPID'] = config('M_Appid');
		$this->config['MCHID'] = config('M_PartnerId');
		$this->config['KEY'] = config('M_PartnerKey');
		$this->config['APPSECRET'] = config('M_Appsecret');
	}
	public function setConfig($param){
		$this->config['CURL_TIMEOUT']   = 30;
		$this->config['gateway_method'] ='js';
		$this->config['APPID'] = C('M_Appid');
		$this->config['MCHID'] = C('M_PartnerId');
		$this->config['KEY'] = C('M_PartnerKey');
	}
	
	/**
	 * @see paymentplugin::getSubmitUrl()
	 */
	public function getSubmitUrl()
	{
		return 'https://mapi.alipay.com/gateway.do?_input_charset=utf-8';
	}
	/**
	 * @see paymentplugin::notifyStop()
	 */
	public function notifyStop()
	{
		echo "success";
	}
	/**
	 * @see paymentplugin::callback()
	 */
	public function callback($callbackData,&$paymentId,&$money,&$message,&$orderNo)
	{
		//除去待签名参数数组中的空值和签名参数
		$para_filter = $this->paraFilter($callbackData);

		//对待签名参数数组排序
		$para_sort = $this->argSort($para_filter);
		//验证签名结果
		$isSign = $this->getSignVeryfy($para_sort,$callbackData['sign']);
		
		if($isSign)
		{
			//回传数据
			$orderNo = $callbackData['out_trade_no'];
			$money   = $callbackData['total_fee']/100;
	
			return true;
		}
		else
		{
			$message = '签名不正确';
		}
		return false;
	}
	/**
	 * @see paymentplugin::serverCallback()
	 */
	public function serverCallback($callbackData,&$paymentId,&$money,&$message,&$orderNo)
	{
		return $this->callback($callbackData,$paymentId,$money,$message,$orderNo);
	}
	public function getpreparedata1($payment) {
		$config = array(
			'APPID' => $payment['M_Appid'],
			'MCHID' => $payment['M_PartnerId'],
			'KEY'  => $payment['M_PartnerKey'],
			'CURL_TIMEOUT' => 30,
		);
		$nativeLink = new NativeLink_pub($config);	
		$out_trade_no = $payment['M_OrderNO'];
		$nativeLink->setParameter("product_id","$out_trade_no");
		
		return $nativeLink;
		
	}

	public function qrcode($payment){
		
		$product_url = $this->getpreparedata1($payment)->getUrl();
		$config = array(
			'APPID' => $payment['M_Appid'],
			'MCHID' => $payment['M_PartnerId'],
			'KEY'  => $payment['M_PartnerKey'],
			'CURL_TIMEOUT' => 30,
		);
		$shortUrl = new ShortUrl_pub($config);
		$shortUrl->setParameter("long_url","$product_url");
		$codeUrl = $shortUrl->getShortUrl();
		print_r($codeUrl); exit;
		return $codeUrl;
	}

	public function UnifiedOrder($payment){
		$config = array(
			'APPID' => $payment['M_Appid'],
			'MCHID' => $payment['M_PartnerId'],
			'KEY'  => $payment['M_PartnerKey'],
			'CURL_TIMEOUT' => 30,
			'server'=>$payment['server']
		);
		$unifiedOrder = new UnifiedOrder_pub($config); 
		$unifiedOrder->setParameter("body",$payment['body']);
		$unifiedOrder->setParameter("out_trade_no",$payment['out_trade_no']);//商户订单号 
		$unifiedOrder->setParameter("total_fee",$payment['total_fee']*100);//总金额
		$unifiedOrder->setParameter("notify_url", $payment['notify_url']);//通知地址 
		$unifiedOrder->setParameter("trade_type",$payment['trade_type']);//交易类型
		$unifiedOrder->setParameter("product_id",$payment['product_id']);//交易类型
		$data = $unifiedOrder->getPrepayId();
		//print_r($data); exit;
		//=========步骤3：使用jsapi调起支付============
		//$jsApi->setPrepayId($prepay_id);
		return $data;
	}
	
	public function receive(){
		$notify = new Notify_pub($this->config); 
		$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
		$notify->saveData($xml);
		if($notify->checkSign() == FALSE){
			$notify->setReturnParameter("return_code","FAIL");//返回状态码
			$returnData['order_status']=1;
		}else{
			$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
			$returnData=$notify->getData();
			$returnData['order_status']=0;
		}
		$returnXml = $notify->returnXml(); 
		return array('xml'=>$returnXml,'data'=>$returnData);
	}

	public function converParamToArray($params) {
		$url = parse_url($params);
		$arr = [];
		foreach(explode('&',$url['query']) as $key=>$val) {
			list($k,$v) = explode('=',$val);
			$arr[$k] = $v;
		}
		return $arr;
	}

	public function getSendData($payment){
		//$this->config['MHID'];

		$this->config = array(
			'APPID' => $payment['M_Appid'],
			'MCHID' => $payment['M_PartnerId'],
			'KEY'  => $payment['M_PartnerKey'],
			'CURL_TIMEOUT' => 30,
			'JS_API_CALL_URL'=>urlencode('http://'.$payment['server']['server_name'].'/payment'.$payment['server']["request_uri"]),
			//'JS_API_CALL_URL'=>urlencode('http://'.$_SERVER['SERVER_NAME'].'/payment'.$_SERVER["REQUEST_URI"]),
			'APPSECRET' => config('weipay.M_Appsecret'),
			'server'=>$payment['server']
		);
		//print_r($this->config); exit;
		$jsApi = new JsApi_pub($this->config);
		if(!$payment['openid']) {
			//=========步骤1：网页授权获取用户openid============
			//通过code获得openid
			if (!isset($_GET['code']))
			{
				//触发微信返回code码
				$url = $jsApi->createOauthUrlForCode($this->config['JS_API_CALL_URL']);
				$return['status'] = 1;
				//$return['url'] = $this->converParamToArray($url);
				$return['url'] = $url;
				exit(json_encode($return)) ;
				//Header("Location: $url");
			}else
			{
				//获取code码，以获取openid
				$code = $_GET['code'];
				$jsApi->setCode($code);
				$openid = $jsApi->getOpenid();

			}
		}else{
			$openid = $payment['openid'];
		}

		$unifiedOrder = new UnifiedOrder_pub($this->config);
		$unifiedOrder->setParameter("openid","$openid");
		$unifiedOrder->setParameter("body",$payment['R_Name']);

		//$out_trade_no = $this->order_info['id'];
		$unifiedOrder->setParameter("out_trade_no",$payment['M_OrderNO']);//商户订单号 
		$unifiedOrder->setParameter("total_fee",$payment['M_Amount']);//总金额
		$unifiedOrder->setParameter("notify_url", $payment['notify_url']);//通知地址 
		$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型

		$prepay_id = $unifiedOrder->getPrepayId();

		//=========步骤3：使用jsapi调起支付============
		$jsApi->setPrepayId($prepay_id);

		$jsApiParameters = $jsApi->getParameters();
		return $jsApiParameters;
		/*return '<script type="text/javascript">
		function jsApiCall()
		{
			WeixinJSBridge.invoke(
				"getBrandWCPayRequest",
				'.$jsApiParameters.',
				function(res){
					for(var i in res){
						//alert(i+":"+res[i])
				}

					WeixinJSBridge.log(res.err_msg);
					//alert(res.err_code+res.err_desc+res.err_msg);
				}
			);
		}

		function callpay()
		{	
			$(".dosubmit").attr("disabled",true);
			if (typeof WeixinJSBridge == "undefined"){
			    if( document.addEventListener ){
			        document.addEventListener("WeixinJSBridgeReady", jsApiCall, false);
			    }else if (document.attachEvent){
			        document.attachEvent("WeixinJSBridgeReady", jsApiCall); 
			        document.attachEvent("onWeixinJSBridgeReady", jsApiCall);
			    }
			}else{
			    jsApiCall();
			}
		}
		';*/
		
	}
	public function userinfo($JS_API_CALL_URL){
		$jsApi = new JsApi_pub($this->config);

		//=========步骤1：网页授权获取用户openid============
		//通过code获得openid
		if (!isset($_GET['code']))
		{
			//触发微信返回code码
			$url = $jsApi->createOauthUrlForCode($JS_API_CALL_URL);
			//echo $url;exit;
			Header("Location: $url");
			exit;			
		}else
		{
			//获取code码，以获取openid
		    $code = $_GET['code'];
			$jsApi->setCode($code);
			$userinfo = $jsApi->getUserInfo();
			return $userinfo;
		}
	}
	public function notify(){
		$config = array(
			'APPID' => config('M_Appid'),
			'MCHID' => config('M_PartnerId'),
			'KEY'  => config('M_PartnerKey'),
			'CURL_TIMEOUT' => 30,
		);		 
		$notify = new Notify_pub($config); 
		$xml = $GLOBALS['HTTP_RAW_POST_DATA']??file_get_contents('php://input');
		$notify->saveData($xml);
		//if($notify->checkSign() == FALSE){
		//	$notify->setReturnParameter("return_code","FAIL");//返回状态码
		//	$returnData['order_status']=1;
		//}else{
			$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
			$returnData=$notify->getData();
			$returnData['order_id']=$returnData['out_trade_no']??'';
			$returnData['trade_no'] = $returnData['transaction_id']??'';
			$returnData['order_status']=0;
			//$this->recordTradeNo($returnData['order_id'],$returnData['trade_no']);
			
		//}
		$returnXml = $notify->returnXml(); 
		$returnData['xml']=$returnXml;
		return $returnData;
		 
	}
	public function response($result) {
		$nativeCall = new NativeCall_pub($this->config);
		$unifiedOrder = new UnifiedOrder_pub($this->config);
		$unifiedOrder->setParameter("body",$this->product_info['body']);
		$out_trade_no = $this->product_info['order_sn'];
		$price=$this->product_info['price']*100;
		$unifiedOrder->setParameter("out_trade_no","$out_trade_no");
		$unifiedOrder->setParameter("product_id","$out_trade_no");
		$unifiedOrder->setParameter("total_fee","$price");
		$unifiedOrder->setParameter("notify_url",$this->config['notify_url']);
		$unifiedOrder->setParameter("trade_type","NATIVE");//交易类型
		$prepay_id = $unifiedOrder->getPrepayId();
	 
		$nativeCall->setReturnParameter("return_code","SUCCESS");//返回状态码
		$nativeCall->setReturnParameter("result_code","SUCCESS");//返回状态码
		$nativeCall->setReturnParameter("prepay_id","$prepay_id");//预支付ID
		$returnXml = $nativeCall->returnXml();
	 
		return $returnXml;
    }
	public function order_query($out_trade_no){
		$orderquery=new OrderQuery_pub($this->config);
		$orderquery->setParameter('out_trade_no',$out_trade_no);
		$orderQueryResult = $orderquery->getResult();
		return $orderQueryResult;
	}
}

class WxPayConf_pub
{
	public $config;
	private static $_instance;
	 public static function getInstance(){
		if(!isset(self::$_instance))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
	}
	function setconf($config){
		$this->config=$config;
	}
	function getconf(){
		//print_r($this->config);
		return $this->config;
	}
}
class Common_util_pub
{
	public $config;
	function __construct() {
		
	}

	function trimString($value)
	{
		$ret = null;
		if (null != $value) 
		{
			$ret = $value;
			if (strlen($ret) == 0) 
			{
				$ret = null;
			}
		}
		return $ret;
	}
	
	/**
	 * 	作用：产生随机字符串，不长于32位
	 */
	public function createNoncestr( $length = 32 ) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
		$str ="";
		for ( $i = 0; $i < $length; $i++ )  {  
			$str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
		}  
		return $str;
	}
	
	/**
	 * 	作用：格式化参数，签名过程需要使用
	 */
	function formatBizQueryParaMap($paraMap, $urlencode)
	{
		$buff = "";
		ksort($paraMap);
		foreach ($paraMap as $k => $v)
		{
		    if($urlencode)
		    {
			   $v = urlencode($v);
			}
			//$buff .= strtolower($k) . "=" . $v . "&";
			$buff .= $k . "=" . $v . "&";
		}
		$reqPar = '';
		if (strlen($buff) > 0) 
		{
			$reqPar = substr($buff, 0, strlen($buff)-1);
		}
		return $reqPar;
	}
	
	/**
	 * 	作用：生成签名
	 */
	public function getSign($Obj)
	{
		foreach ($Obj as $k => $v)
		{
			$Parameters[$k] = $v;
		}
		//签名步骤一：按字典序排序参数
		ksort($Parameters); 
		$String = $this->formatBizQueryParaMap($Parameters, false);
		//echo '【string1】'.$String.'</br>';
		//签名步骤二：在string后加入KEY
		
		$String = $String."&key=".$this->config['KEY'];
		//echo "【string2】".$String."</br>";
		//签名步骤三：MD5加密
		$String = md5($String);
		//echo "【string3】 ".$String."</br>";
		//签名步骤四：所有字符转为大写
		$result_ = strtoupper($String);
		//echo "【result】 ".$result_."</br>";
		return $result_;
	}
	
	/**
	 * 	作用：array转xml
	 */
	function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
        	 if (is_numeric($val))
        	 {
        	 	$xml.="<".$key.">".$val."</".$key.">"; 

        	 }
        	 else
        	 	$xml.="<".$key."><![CDATA[".$val."]]></".$key.">";  
        }
        $xml.="</xml>";
        return $xml; 
    }
	
	/**
	 * 	作用：将xml转为array
	 */
	public function xmlToArray($xml)
	{		
		libxml_disable_entity_loader(true);
        //将XML转为array        
        $array_data = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);		
		return $array_data;
	}

	/**
	 * 	作用：以post方式提交xml到对应的接口url
	 */
	public function postXmlCurl($xml,$url,$second=30)
	{	 
        //初始化curl        
       	$ch = curl_init();
		//设置超时
		curl_setopt($ch,CURLOPT_TIMEOUT, $second);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		//设置header
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//post提交方式
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		//运行curl
        $data = curl_exec($ch);
		//curl_close($ch);
		//返回结果
		if($data)
		{
			curl_close($ch); 
			return $data;
		}
		else 
		{ 
			$error = curl_errno($ch);
			echo "curl出错，错误码:$error"."<br>"; 
			echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
			curl_close($ch);
			return false;
		}
	}

	/**
	 * 	作用：使用证书，以post方式提交xml到对应的接口url
	 */
	function postXmlSSLCurl($xml,$url,$second=30)
	{ 
		$ch = curl_init();
		//超时时间
		curl_setopt($ch,CURLOPT_TIMEOUT,$second);
		//这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		//设置header
		curl_setopt($ch,CURLOPT_HEADER,FALSE);
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		//设置证书
		//使用证书：cert 与 key 分别属于两个.pem文件
		//默认格式为PEM，可以注释
		curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
		curl_setopt($ch,CURLOPT_SSLCERT, WxPayConf_pub::SSLCERT_PATH);
		//默认格式为PEM，可以注释
		curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
		curl_setopt($ch,CURLOPT_SSLKEY, WxPayConf_pub::SSLKEY_PATH);
		//post提交方式
		curl_setopt($ch,CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$xml);
		$data = curl_exec($ch);
		//返回结果
		if($data){
			curl_close($ch);
			return $data;
		}
		else { 
			$error = curl_errno($ch);
			echo "curl出错，错误码:$error"."<br>"; 
			echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
			curl_close($ch);
			return false;
		}
	}
	
	/**
	 * 	作用：打印数组
	 */
	function printErr($wording='',$err='')
	{
		print_r('<pre>');
		echo $wording."</br>";
		var_dump($err);
		print_r('</pre>');
	}
}

/**
 * 请求型接口的基类
 */
class Wxpay_client_pub extends Common_util_pub 
{
	var $parameters;//请求参数，类型为关联数组
	public $response;//微信返回的响应
	public $result;//返回参数，类型为关联数组
	var $url;//接口链接
	public $config;
	var $curl_timeout;//curl超时时间
	function __construct($config){
		$this->config=$config;
	}
	/**
	 * 	作用：设置请求参数
	 */
	function setParameter($parameter, $parameterValue)
	{
		$this->parameters[$this->trimString($parameter)] = $this->trimString($parameterValue);
	}
	
	/**
	 * 	作用：设置标配的请求参数，生成签名，生成接口参数xml
	 */
	function createXml()
	{
	   	$this->parameters["appid"] = $this->config['APPID'];//公众账号ID
	   	$this->parameters["mch_id"] = $this->config['MCHID'];//商户号
	    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
	    $this->parameters["sign"] = $this->getSign($this->parameters);//签名
	    return  $this->arrayToXml($this->parameters);
	}
	
	/**
	 * 	作用：post请求xml
	 */
	function postXml()
	{
	    $xml = $this->createXml();//file_put_contents('1.txt',serialize($xml));
		$this->response = $this->postXmlCurl($xml,$this->url,$this->curl_timeout);//file_put_contents('1.txt',serialize($this->response));
		return $this->response;
	}
	
	/**
	 * 	作用：使用证书post请求xml
	 */
	function postXmlSSL()
	{	
	    $xml = $this->createXml();
		$this->response = $this->postXmlSSLCurl($xml,$this->url,$this->curl_timeout);
		return $this->response;
	}

	/**
	 * 	作用：获取结果，默认不使用证书
	 */
	function getResult() 
	{		
		$this->postXml();
		$this->result = $this->xmlToArray($this->response);
		return $this->result;
	}
}


/**
 * 统一支付接口类
 */
class UnifiedOrder_pub extends Wxpay_client_pub
{	
	function __construct($config) 
	{
		parent::__construct($config);
		$this->config=$config;
		
		//设置接口链接
		$this->url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
		//设置curl超时时间
		$this->curl_timeout = $this->config['CURL_TIMEOUT'];
	}
	
	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{
		try
		{
			//检测必填参数
			if($this->parameters["out_trade_no"] == null) 
			{
				throw new SDKRuntimeException("缺少统一支付接口必填参数out_trade_no！"."<br>");
			}elseif($this->parameters["body"] == null){
				throw new SDKRuntimeException("缺少统一支付接口必填参数body！"."<br>");
			}elseif ($this->parameters["total_fee"] == null ) {
				throw new SDKRuntimeException("缺少统一支付接口必填参数total_fee！"."<br>");
			}elseif ($this->parameters["notify_url"] == null) {
				throw new SDKRuntimeException("缺少统一支付接口必填参数notify_url！"."<br>");
			}elseif ($this->parameters["trade_type"] == null) {
				throw new SDKRuntimeException("缺少统一支付接口必填参数trade_type！"."<br>");
			}elseif ($this->parameters["trade_type"] == "JSAPI" &&
				$this->parameters["openid"] == NULL){
				throw new SDKRuntimeException("统一支付接口中，缺少必填参数openid！trade_type为JSAPI时，openid为必填参数！"."<br>");
			}
		   	$this->parameters["appid"] = $this->config['APPID'];//公众账号ID
		   	$this->parameters["mch_id"] = $this->config['MCHID'];//商户号
		   	$this->parameters["spbill_create_ip"] = $this->config['server']['remote_addr'];//终端ip
		    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->parameters["sign"] = $this->getSign($this->parameters);//签名
				
		    return  $this->arrayToXml($this->parameters);
		}catch (SDKRuntimeException $e)
		{
			die($e->errorMessage());
		}
	}
	
	/**
	 * 获取prepay_id
	 */
	function getPrepayId()
	{

		$this->postXml();
		$this->result = $this->xmlToArray($this->response);
		//$prepay_id = $this->result["prepay_id"];
		return $this->result;
	}
	
}

/**
 * 订单查询接口
 */
class OrderQuery_pub extends Wxpay_client_pub
{
	function __construct($config) 
	{	
	$this->config=$config;
		//设置接口链接
		$this->url = "https://api.mch.weixin.qq.com/pay/orderquery";
		//设置curl超时时间
		$this->curl_timeout =$this->config['CURL_TIMEOUT'];		
	}

	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{
		try
		{
			//检测必填参数
			if($this->parameters["out_trade_no"] == null && 
				$this->parameters["transaction_id"] == null) 
			{
				throw new SDKRuntimeException("订单查询接口中，out_trade_no、transaction_id至少填一个！"."<br>");
			}
		   	$this->parameters["appid"] = $this->config['APPID'];//公众账号ID
		   	$this->parameters["mch_id"] = $this->config['MCHID'];//商户号
		    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->parameters["sign"] = $this->getSign($this->parameters);//签名
		    return  $this->arrayToXml($this->parameters);
		}catch (SDKRuntimeException $e)
		{
			die($e->errorMessage());
		}
	}

}

/**
 * 退款申请接口
 */
class Refund_pub extends Wxpay_client_pub
{
	
	function __construct() {
		//设置接口链接
		$this->url = "https://api.mch.weixin.qq.com/secapi/pay/refund";
		//设置curl超时时间
		$this->curl_timeout = WxPayConf_pub::CURL_TIMEOUT;		
	}
	
	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{
		try
		{
			//检测必填参数
			if($this->parameters["out_trade_no"] == null && $this->parameters["transaction_id"] == null) {
				throw new SDKRuntimeException("退款申请接口中，out_trade_no、transaction_id至少填一个！"."<br>");
			}elseif($this->parameters["out_refund_no"] == null){
				throw new SDKRuntimeException("退款申请接口中，缺少必填参数out_refund_no！"."<br>");
			}elseif($this->parameters["total_fee"] == null){
				throw new SDKRuntimeException("退款申请接口中，缺少必填参数total_fee！"."<br>");
			}elseif($this->parameters["refund_fee"] == null){
				throw new SDKRuntimeException("退款申请接口中，缺少必填参数refund_fee！"."<br>");
			}elseif($this->parameters["op_user_id"] == null){
				throw new SDKRuntimeException("退款申请接口中，缺少必填参数op_user_id！"."<br>");
			}
		   	$this->parameters["appid"] = WxPayConf_pub::APPID;//公众账号ID
		   	$this->parameters["mch_id"] = WxPayConf_pub::MCHID;//商户号
		    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->parameters["sign"] = $this->getSign($this->parameters);//签名
		    return  $this->arrayToXml($this->parameters);
		}catch (SDKRuntimeException $e)
		{
			die($e->errorMessage());
		}
	}
	/**
	 * 	作用：获取结果，使用证书通信
	 */
	function getResult() 
	{		
		$this->postXmlSSL();
		$this->result = $this->xmlToArray($this->response);
		return $this->result;
	}
	
}


/**
 * 退款查询接口
 */
class RefundQuery_pub extends Wxpay_client_pub
{
	
	function __construct() {
		//设置接口链接
		$this->url = "https://api.mch.weixin.qq.com/pay/refundquery";
		//设置curl超时时间
		$this->curl_timeout = WxPayConf_pub::CURL_TIMEOUT;		
	}
	
	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{		
		try 
		{
			if($this->parameters["out_refund_no"] == null &&
				$this->parameters["out_trade_no"] == null &&
				$this->parameters["transaction_id"] == null &&
				$this->parameters["refund_id "] == null) 
			{
				throw new SDKRuntimeException("退款查询接口中，out_refund_no、out_trade_no、transaction_id、refund_id四个参数必填一个！"."<br>");
			}
		   	$this->parameters["appid"] = WxPayConf_pub::APPID;//公众账号ID
		   	$this->parameters["mch_id"] = WxPayConf_pub::MCHID;//商户号
		    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->parameters["sign"] = $this->getSign($this->parameters);//签名
		    return  $this->arrayToXml($this->parameters);
		}catch (SDKRuntimeException $e)
		{
			die($e->errorMessage());
		}
	}

	/**
	 * 	作用：获取结果，使用证书通信
	 */
	function getResult() 
	{		
		$this->postXmlSSL();
		$this->result = $this->xmlToArray($this->response);
		return $this->result;
	}

}

/**
 * 对账单接口
 */
class DownloadBill_pub extends Wxpay_client_pub
{

	function __construct() 
	{
		//设置接口链接
		$this->url = "https://api.mch.weixin.qq.com/pay/downloadbill";
		//设置curl超时时间
		$this->curl_timeout = WxPayConf_pub::CURL_TIMEOUT;		
	}

	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{		
		try 
		{
			if($this->parameters["bill_date"] == null ) 
			{
				throw new SDKRuntimeException("对账单接口中，缺少必填参数bill_date！"."<br>");
			}
		   	$this->parameters["appid"] = WxPayConf_pub::APPID;//公众账号ID
		   	$this->parameters["mch_id"] = WxPayConf_pub::MCHID;//商户号
		    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->parameters["sign"] = $this->getSign($this->parameters);//签名
		    return  $this->arrayToXml($this->parameters);
		}catch (SDKRuntimeException $e)
		{
			die($e->errorMessage());
		}
	}
	
	/**
	 * 	作用：获取结果，默认不使用证书
	 */
	function getResult() 
	{		
		$this->postXml();
		$this->result = $this->xmlToArray($this->result_xml);
		return $this->result;
	}
	
	

}

/**
 * 短链接转换接口
 */
class ShortUrl_pub extends Wxpay_client_pub
{
	function __construct($config) 
	{
		$this->config=$config;
		//设置接口链接
		$this->url = "https://api.mch.weixin.qq.com/tools/shorturl";
		//设置curl超时时间
		$this->curl_timeout = $this->config['CURL_TIMEOUT'];		
	}
	
	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{		
		try 
		{
			if($this->parameters["long_url"] == null ) 
			{
				throw new SDKRuntimeException("短链接转换接口中，缺少必填参数long_url！"."<br>");
			}
		   	$this->parameters["appid"] = $this->config['APPID'];//公众账号ID
		   	$this->parameters["mch_id"] = $this->config['MCHID'];//商户号
		    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->parameters["sign"] = $this->getSign($this->parameters);//签名
		    return  $this->arrayToXml($this->parameters);
		}catch (SDKRuntimeException $e)
		{
			die($e->errorMessage());
		}
	}
	
	/**
	 * 获取prepay_id
	 */
	function getShortUrl()
	{
		$this->postXml();
		$this->result = $this->xmlToArray($this->response);
		$prepay_id = $this->result["short_url"];
		return $prepay_id;
	}
	
}

/**
 * 响应型接口基类
 */
class Wxpay_server_pub extends Common_util_pub 
{
	public $data;//接收到的数据，类型为关联数组
	var $returnParameters;//返回参数，类型为关联数组
	function __construct($config){
		$this->config=$config;
	}
	/**
	 * 将微信的请求xml转换成关联数组，以方便数据处理
	 */
	function saveData($xml)
	{
		$this->data = $this->xmlToArray($xml); 
                file_put_contents('weipay.txt',var_export($this->data,true),FILE_APPEND);
	}
	
	function checkSign()
	{
		$tmpData = $this->data;
		unset($tmpData['sign']);
		$sign = $this->getSign($tmpData);//本地签名
		if ($this->data['sign'] == $sign) {
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * 获取微信的请求数据
	 */
	function getData()
	{		
		return $this->data;
	}
	
	/**
	 * 设置返回微信的xml数据
	 */
	function setReturnParameter($parameter, $parameterValue)
	{
		$this->returnParameters[$this->trimString($parameter)] = $this->trimString($parameterValue);
	}
	
	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{
		return $this->arrayToXml($this->returnParameters);
	}
	
	/**
	 * 将xml数据返回微信
	 */
	function returnXml()
	{
		$returnXml = $this->createXml();
		return $returnXml;
	}
}


/**
 * 通用通知接口
 */
class Notify_pub extends Wxpay_server_pub 
{
	function __construct($config){
		parent::__construct($config);
	}
}




/**
 * 请求商家获取商品信息接口
 */
class NativeCall_pub extends Wxpay_server_pub
{
	function __construct($config){
		$this->config=$config;
	}
	/**
	 * 生成接口参数xml
	 */
	function createXml()
	{
		if($this->returnParameters["return_code"] == "SUCCESS"){
		   	$this->returnParameters["appid"] = $this->config['APPID'];//公众账号ID
		   	$this->returnParameters["mch_id"] = $this->config['MCHID'];//商户号
		    $this->returnParameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->returnParameters["sign"] = $this->getSign($this->returnParameters);//签名
		}
		return $this->arrayToXml($this->returnParameters);
	}
	
	/**
	 * 获取product_id
	 */
	function getProductId()
	{
		$product_id = $this->data["product_id"];
		return $product_id;
	}
	
}

/**
 * 静态链接二维码
 */
class NativeLink_pub  extends Common_util_pub
{
	var $parameters;//静态链接参数
	var $url;//静态链接
	
	function __construct($config) 
	{
		$this->config=$config;
	}
	
	/**
	 * 设置参数
	 */
	function setParameter($parameter, $parameterValue) 
	{
		$this->parameters[$this->trimString($parameter)] = $this->trimString($parameterValue);
	}
	
	/**
	 * 生成Native支付链接二维码
	 */
	function createLink()
	{
		try 
		{		
			if($this->parameters["product_id"] == null) 
			{
				throw new SDKRuntimeException("缺少Native支付二维码链接必填参数product_id！"."<br>");
			}			
		   	$this->parameters["appid"] = $this->config['APPID'];//公众账号ID
		   	$this->parameters["mch_id"] = $this->config['MCHID'];//商户号
		   	$time_stamp = time();
		   	$this->parameters["time_stamp"] = "$time_stamp";//时间戳
		    $this->parameters["nonce_str"] = $this->createNoncestr();//随机字符串
		    $this->parameters["sign"] = $this->getSign($this->parameters);//签名  
		
			$bizString = $this->formatBizQueryParaMap($this->parameters, false);
			
		    $this->url = "weixin://wxpay/bizpayurl?".$bizString;
			 print_r($this->url); exit;
			
		}catch (SDKRuntimeException $e)
		{
			die($e->errorMessage());
		}
	}
	
	/**
	 * 返回链接
	 */
	function getUrl() 
	{		
		$this->createLink();
		return $this->url;
	}
}

/**
* JSAPI支付——H5网页端调起支付接口
*/
class JsApi_pub extends Common_util_pub
{
	var $code;//code码，用以获取openid
	var $openid;//用户的openid
	var $parameters;//jsapi参数，格式为json
	var $prepay_id;//使用统一支付接口得到的预支付id
	var $curl_timeout;//curl超时时间

	function __construct($config) 
	{
		$this->config = $config;
		//设置curl超时时间
		$this->curl_timeout = $this->config['CURL_TIMEOUT'];
	}
	
	/**
	 * 	作用：生成可以获得code的url
	 */
	function createOauthUrlForCode($redirectUrl)
	{
		
		$urlObj["appid"] = $this->config['APPID'];
		$urlObj["redirect_uri"] = "$redirectUrl";
		$urlObj["response_type"] = "code";
		$urlObj["scope"] = "snsapi_userinfo";
		$urlObj["state"] = "STATE"."#wechat_redirect";
		$bizString = $this->formatBizQueryParaMap($urlObj, false);
		return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
	}

	/**
	 * 	作用：生成可以获得openid的url
	 */
	function createOauthUrlForOpenid()
	{
		$urlObj["appid"] = $this->config['APPID'];
		$urlObj["secret"] = $this->config['APPSECRET'];
		$urlObj["code"] = $this->code;
		$urlObj["grant_type"] = "authorization_code";
		//print_r($urlObj); exit; 
		$bizString = $this->formatBizQueryParaMap($urlObj, false);
		return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
	}
	
	
	/**
	 * 	作用：通过curl向微信提交code，以获取openid
	 */
	function getOpenid()
	{
		$url = $this->createOauthUrlForOpenid();
        //初始化curl
       	$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOP_TIMEOUT, $this->curl_timeout);
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//运行curl，结果以jason形式返回
        $res = curl_exec($ch);
		curl_close($ch);
		//取出openid
		$data = json_decode($res,true);
		$this->openid = $data['openid'];
		return $this->openid;
	}
	
	function getUserInfo(){
		$url = $this->createOauthUrlForOpenid();//echo $url;
        //初始化curl
       	$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOP_TIMEOUT, $this->curl_timeout);
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//运行curl，结果以jason形式返回
        $res = curl_exec($ch);
		curl_close($ch);
		//取出openid
		$data = json_decode($res,true);
		
		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$data['access_token']."&openid=".$data['openid']."&lang=zh_CN";//echo $url;
        //初始化curl
       	$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOP_TIMEOUT, $this->curl_timeout);
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//运行curl，结果以jason形式返回
        $res_ = curl_exec($ch);
		curl_close($ch);
		//取出openid
		$data_ = json_decode($res_,true);
		return $data_;
	}
	
	/**
	 * 	作用：设置prepay_id
	 */
	function setPrepayId($prepayId)
	{
		$this->prepay_id = $prepayId['prepay_id'];
		//print_r($prepayId);
	}

	/**
	 * 	作用：设置code
	 */
	function setCode($code_)
	{
		$this->code = $code_;
		
	}

	/**
	 * 	作用：设置jsapi的参数
	 */
	public function getParameters()
	{
		$jsApiObj["appId"] = $this->config['APPID'];
		$timeStamp = time();
	    $jsApiObj["timeStamp"] = "$timeStamp";
	    $jsApiObj["nonceStr"] = $this->createNoncestr();
		$jsApiObj["package"] = "prepay_id=$this->prepay_id";
	    $jsApiObj["signType"] = "MD5";
	    $jsApiObj["paySign"] = $this->getSign($jsApiObj);

		//print_r($jsApiObj); exit;
	    $this->parameters = json_encode($jsApiObj);
		
		return $this->parameters;
	}
}
class  SDKRuntimeException extends \Exception {
	public function errorMessage()
	{
		return $this->getMessage();
	}

}
?>
