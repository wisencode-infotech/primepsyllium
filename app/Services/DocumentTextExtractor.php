<?php

namespace App\Services;

use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use Smalot\PdfParser\Parser as PdfParser;

class DocumentTextExtractor
{
    public function extract(string $absolutePath, string $mimeType): string
    {
        return match (true) {
            $mimeType === 'application/pdf' => $this->extractPdf($absolutePath),
            in_array($mimeType, [
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ], true) => $this->extractDocx($absolutePath),
            default => $this->extractTxt($absolutePath),
        };
    }

    private function extractPdf(string $absolutePath): string
    {
        $parser = new PdfParser();

        return trim($parser->parseFile($absolutePath)->getText());
    }

    private function extractDocx(string $absolutePath): string
    {
        $document = WordIOFactory::load($absolutePath);
        $text = '';

        foreach ($document->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getText')) {
                    $text .= $element->getText()."\n";
                }
            }
        }

        return trim($text);
    }

    private function extractTxt(string $absolutePath): string
    {
        return trim(file_get_contents($absolutePath));
    }
}
