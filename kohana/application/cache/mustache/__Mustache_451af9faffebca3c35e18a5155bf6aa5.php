<?php

class __Mustache_451af9faffebca3c35e18a5155bf6aa5 extends Mustache_Template
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
        $buffer .= $indent . '</form>';
        $buffer .= "\n";

        return $buffer;
    }
}
