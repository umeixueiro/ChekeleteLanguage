<?php
namespace app\inclusive;


class chekelete
{
    private const COMB_LOWER = ['ca', 'que', 'qui', 'co', 'cu'];
    private const COMB_LOWER_SOFT = ['ci'];
    private const COMB_LOWER_ACCENT = ['cá', 'qué', 'quí', 'có', 'cú'];
    private const COMB_LOWER_ACCENT_SOFT = ['cí'];
    private const COMB_UPPER = ['Ca', 'Que', 'Qui', 'Co', 'Cu'];
    private const COMB_UPPER_SOFT = ['Ci'];
    private const COMB_UPPER_ACCENT = ['Cá', 'Qué', 'Quí', 'Có', 'Cú'];
    private const COMB_UPPER_ACCENT_SOFT = ['Cí'];
    private const VOCAL_LOWER = ['a', 'e', 'i', 'o', 'u'];
    private const VOCAL_LOWER_ACCENT = ['á', 'é', 'í', 'ó', 'ú'];
    private const VOCAL_UPPER = ['A', 'E', 'I', 'O', 'U'];
    private const VOCAL_UPPER_ACCENT = ['Á', 'É', 'Í', 'Ó', 'Ú'];
    private array $combinations;
    private array $vocals;

    function __construct()
    {
        $this->combinations = array_merge(
            self::COMB_LOWER,
            self::COMB_LOWER_SOFT,
            self::COMB_LOWER_ACCENT,
            self::COMB_LOWER_ACCENT_SOFT,
            self::COMB_UPPER,
            self::COMB_UPPER_SOFT,
            self::COMB_UPPER_ACCENT,
            self::COMB_UPPER_ACCENT_SOFT
        );
        $this->vocals = array_diff(
            array_merge(
                self::VOCAL_LOWER,
                self::VOCAL_UPPER,
                self::VOCAL_LOWER_ACCENT,
                self::VOCAL_UPPER_ACCENT,
                array('e', 'E', 'é', 'É')
            )
        );
    }

    function translate($text): string
    {
        foreach ($this->combinations as $combination) {
            switch ($combination) {
                case in_array($combination, self::COMB_LOWER);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'ke', $text);
                    }
                    break;
                case in_array($combination, self::COMB_LOWER_SOFT);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'se', $text);
                    }
                    break;
                case in_array($combination, self::COMB_LOWER_ACCENT);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'ké', $text);
                    }
                    break;
                case in_array($combination, self::COMB_LOWER_ACCENT_SOFT);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'sé', $text);
                    }
                    break;
                case in_array($combination, self::COMB_UPPER);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'Ke', $text);
                    }
                    break;
                case in_array($combination, self::COMB_UPPER_SOFT);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'Se', $text);
                    }
                    break;
                case in_array($combination, self::COMB_UPPER_ACCENT);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'Ké', $text);
                    }
                    break;
                case in_array($combination, self::COMB_UPPER_ACCENT_SOFT);
                    if (!empty($text)) {
                        $text = str_replace($combination, 'Sé', $text);
                    }
                    break;
                default;
                    break;
            }
        }

        foreach ($this->vocals as $vocal) {
            switch ($vocal) {
                case in_array($vocal, self::VOCAL_LOWER):
                    if (!empty($text)) {
                        $text = str_replace($vocal, 'e', $text);
                    }
                    break;
                case in_array($vocal, self::VOCAL_LOWER_ACCENT):
                    if (!empty($text)) {
                        $text = str_replace($vocal, 'é', $text);
                    }
                    break;
                case in_array($vocal, self::VOCAL_UPPER):
                    if (!empty($text)) {
                        $text = str_replace($vocal, 'E', $text);
                    }
                    break;
                case in_array($vocal, self::VOCAL_UPPER_ACCENT):
                    if (!empty($text)) {
                        $text = str_replace($vocal, 'É', $text);
                    }
                    break;
                default:
                    break;
            }
        }

        return $text;
    }
}