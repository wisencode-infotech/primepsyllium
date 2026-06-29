<?php

namespace App\Models\Concerns;

trait HasRichContent
{
    public function getCleanContentAttribute(): ?string
    {
        $content = $this->content;

        if (! $content) {
            return null;
        }

        $pattern = '/<(p|div|h[1-6])(\s[^>]*)?>(\s|&nbsp;|<br\s*\/?>)*<\/\1>/i';

        do {
            $content = preg_replace($pattern, '', $content, -1, $count);
        } while ($count > 0);

        $content = trim($content);

        return $content !== '' ? $content : null;
    }
}
