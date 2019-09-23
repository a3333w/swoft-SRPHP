<?php

return [
    'privateKey'=>'-----BEGIN RSA PRIVATE KEY-----
MIIEogIBAAKCAQEAoO7bVJ7aKbcKGoZmPwTHutNqT9886BpSiXdNzXgdla+5UOKy
EkX/nCBirbcULYtLICoTdClVZlX/eYiJjyjjkCfKaxZ7v7L9H1geQyMdQPoLUXiM
XPn5fFn414Xf95OLWJw0A++5i6HFocRrIlvvBJihJjUHsQMUyKzBpX7EdcaCmf0Z
4VsdiLqBP23Nz9oy7FjjeLdse1NpLxLfzIyk7VZNMr5yX5PiAYRA4YXl4AWw0ybX
s+jC76l+phQPs5+1WJxAwlQXF3IPbcu/dhcuKInwegy5xvYsyRl0TFSDt3vn4m4i
WTGu3u6SYzX+vPrbTJt2Orc5xFLmy0ZXfMsUbwIDAQABAoIBAA81xAEBanka1Zeg
MDWwi/f6V0fpP2ZoZnibj/zlZ1ZoX0lnw5C6kOf+n5TvgrazPYxyrZgC+BFN+3FP
GEExiiBrwlPQsi1yCz5VI7cQsIkdmMhAbnOzJIM+NaiY/Iv3o+niCYB9vbmWtokN
eVqr+bEjg8eKp4lxUxuMSFkN3B+NVxcgxQsZdDSrPinbtUaPdqz0ipktqWCRYnFp
FqT3Eo6KNi6WtwM+5SPH3KvpE6PNxfRux6aZQ5KAhxxvz2g8ko1DNQs1pCcX8/oy
mclF9aZkSyDVAlvcICjCGrQMIWuilV+e3lFMKvDLxKxOegUVT4HN+/WvfyhvgwjI
D4bxWdECgYEAzmqxp9Ny7Ug/wkFhKKr3jttku4pefAo0YEc6unHIt3wvZUYHZLtQ
ELDq9r4JUgCjCOEY2yVaQGuUnk9GNvJggqkgf2cxQT5pnMYpuXcVdgLZc/AfKepN
JOIfyHKrV4WGsJdCCKzv67Gn/ZI3VavlmqvRHp5QcuwNT0UES4v/x9MCgYEAx5c0
dXLl0e5WbHOZHw6zo3hlAZaNEzuGkRj2z4zzuaE6jKJdtq8uD9xrT8TZwTeGn5aa
Ap3kzOuRi2gf72bmTiK46Vi16jwOWuzLxIi610u3M6sRt9Vy4yoVtyshN8b+ria1
fB1mNLZ2i+LNTGweu+ljMQWmo3gG9QBimih4m3UCgYBEk6PUGubKuD8efXQW+73l
QzRTLiQ313gRKHj1akoB04s3fS2FpMlz0iMtuHMGQFnp4EbOv7kdP+CPO80bAilY
H3JBgXoWr/KMeDVyfYKuw0GVSAhCd6oLf+iJQrd0C1N1Jbt1gGbxCgPCtaoWl1Zf
rYd7QaN+mrfNRyOnKarfqwKBgEXXdmbm5t7YLOvUY6+HgHrihU3R9dnWCZe6iZtF
MoAxmABgTLTBhjfMpMyMELrZCEXN+GSUBd1jTVHgBNTMSCjtY5FcFoQ5sbhFhmRm
iCMQfrIY2aFfks1FC8ZF1GDlRHeCWh1tWDd35fG7UqW8a+DLoYck+BPZy21uThKt
uM6FAoGAVqHsPDsKKGdg5cTlaT9pxtdjThKyR0Te+ODNWOKDvmFPwWRuVeuDrWIg
wk806ZMBZk7fcwxzyBhYyiC220pOfw3keq0Bn5O32TaUgdmhd3rHrc0GAnZZTvNs
n4y7VpgQzRhCtdrVT6SH9t9JWn2PunjW5xwMxtOGnxj6jxrPyZk=
-----END RSA PRIVATE KEY-----
',//私钥
    'publicKey'=>'-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoO7bVJ7aKbcKGoZmPwTH
utNqT9886BpSiXdNzXgdla+5UOKyEkX/nCBirbcULYtLICoTdClVZlX/eYiJjyjj
kCfKaxZ7v7L9H1geQyMdQPoLUXiMXPn5fFn414Xf95OLWJw0A++5i6HFocRrIlvv
BJihJjUHsQMUyKzBpX7EdcaCmf0Z4VsdiLqBP23Nz9oy7FjjeLdse1NpLxLfzIyk
7VZNMr5yX5PiAYRA4YXl4AWw0ybXs+jC76l+phQPs5+1WJxAwlQXF3IPbcu/dhcu
KInwegy5xvYsyRl0TFSDt3vn4m4iWTGu3u6SYzX+vPrbTJt2Orc5xFLmy0ZXfMsU
bwIDAQAB
-----END PUBLIC KEY-----
',//公钥
    'systemExp'=>'86400',//系统管理账号过期时间
    'userExp'=>'86400',  //普通账号过期时间
    'type'=>'RS256',//加密类型
    'systemUserRole'=>'admin',            //系统角色名称
    'userRole'=>'user',                    //普通角色名称
    'systemUserUri'=>'admin',     //系统账号登陆时候获取token的api URI
    'userUri'=>'user',             //普通账号登陆时候获取token的api URI
];
