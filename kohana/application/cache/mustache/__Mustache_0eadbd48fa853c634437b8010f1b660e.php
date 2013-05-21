<?php

class __Mustache_0eadbd48fa853c634437b8010f1b660e extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h2>Contact KohaBlog</h2>';
        $buffer .= "\n";
        $buffer .= $indent . 'If you want to contact us, please, fill form below :) .';
        $buffer .= "\n";
        $buffer .= $indent . '<form action="/contact" method="post" id="contact_form" accept-charset="utf-8" class="blogger">';
        $buffer .= "\n";
        $buffer .= $indent . '<label for="username">User:</label>';
        $buffer .= "\n";
        $buffer .= $indent . '<input type="text" name="username" />';
        $buffer .= "\n";
        $buffer .= $indent . '<label for="body">Body:</label>';
        $buffer .= "\n";
        $buffer .= $indent . '<input type="submit" name="submit" value="Submit" />';
        $buffer .= "\n";
        $buffer .= $indent . '</form>';
        $buffer .= "\n";

        return $buffer;
    }
}
