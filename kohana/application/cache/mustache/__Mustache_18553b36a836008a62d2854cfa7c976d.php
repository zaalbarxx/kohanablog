<?php

class __Mustache_18553b36a836008a62d2854cfa7c976d extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h2>Contact KohaBlog</h2>';
        $buffer .= "\n";
        $buffer .= $indent . 'If you want to contact us, please, fill form below :) .';
        $buffer .= "\n";
        $buffer .= $indent . '<form action="/contact/add" method="POST" accept-charset="utf-8" class="blogger">';
        $buffer .= "\n";
        $buffer .= $indent . '<label for="name">Name:</label>';
        $buffer .= "\n";
        $buffer .= $indent . '<input type="text" name="name" />';
        $buffer .= "\n";
        $buffer .= $indent . '<label for="email">Email:</label>';
        $buffer .= "\n";
        $buffer .= $indent . '<input type="email" name="email" />';
        $buffer .= "\n";
        $buffer .= $indent . '<label for="subject">Subject:</label>';
        $buffer .= "\n";
        $buffer .= $indent . '<input type="text" name="subject" />';
        $buffer .= "\n";
        $buffer .= $indent . '<label for="body">Message:</label>';
        $buffer .= "\n";
        $buffer .= $indent . '<textarea name="body" cols="50" rows="10"></textarea>';
        $buffer .= "\n";
        $buffer .= $indent . '<input type="submit" name="submit" value="Submit" />';
        $buffer .= "\n";
        $buffer .= $indent . '</form>';
        $buffer .= "\n";

        return $buffer;
    }
}
