<?php declare(strict_types=1);


namespace Swoft\Devtool\Helper;


/**
 * Class ConsoleHelper
 *
 * @since 2.0
 */
class ConsoleHelper
{


    /**
     * Send confirm question
     *
     * @param string $question question
     * @param bool   $default  Default value
     *
     * @return bool
     */
    public static function confirm(string $question, $default = true): bool
    {
        if (!$question = trim($question)) {
            \output()->writeln('Please provide a question message!', true);
        }

        $question    = ucfirst(trim($question, '?'));
        $default     = (bool)$default;
        $defaultText = $default ? 'yes' : 'no';
        $message     = "<comment>$question ?</comment>\nPlease confirm (yes|no)[default:<info>$defaultText</info>]: ";

        while (true) {
            \output()->writeln($message, false);
            $answer = \input()->read();

            if (empty($answer)) {
                return $default;
            }

            if (0 === stripos($answer, 'y')) {
                return true;
            }

            if (0 === stripos($answer, 'n')) {
                return false;
            }
        }

        return false;
    }
}
