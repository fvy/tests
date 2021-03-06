<?php

/**
 * Класс анализатор текста
 * Class TextAnalyzer
 */
class TextAnalyzer
{
    /**
     * Возвращаем массив из 5 наиболее часто встречающихся слов в этом тексте
     * Ключ массива — слово,
     * Значение массива — количество
     * @param string $text
     * @return array
     */
    public function getMostUsedWords(string $text): ?array
    {
        $result = [];
        $words = $this->splitTextInWords($text);

        foreach ($words as $word) {

            $word = mb_strtoupper($word);

            !isset($result[$word])
                ? $result[$word] = 1
                : $result[$word]++;
        }

        arsort($result);

        return array_slice($result, 0, 5);
    }

    /**
     * Разбиваем текст на слова
     * @param string $text
     * @return array
     */
    private function splitTextInWords(string $text): array
    {
        preg_match_all('#\w+#imu', $text, $matches);

        return current($matches);
    }
}

$txtObj = new TextAnalyzer;
print_r($txtObj->getMostUsedWords("Привет привет привет, я очень рад, что ты очень рад, что я очень рад, Пух!"));
