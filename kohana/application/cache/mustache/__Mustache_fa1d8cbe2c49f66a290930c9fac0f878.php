<?php

class __Mustache_fa1d8cbe2c49f66a290930c9fac0f878 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<h2>Contact KohaBlog</h2>';
        $buffer .= "\n";
        $buffer .= $indent . 'If you want to contact us, please, fill form below :) .';
        $buffer .= "\n";
        $buffer .= $indent . '&lt;form action=&quot;/contact&quot; method=&quot;post&quot; id=&quot;contact_form&quot; accept-charset=&quot;utf-8&quot; class=&quot;blogger&quot;&gt;';
        $buffer .= "\n";
        $buffer .= $indent . '&lt;label for=&quot;username&quot;&gt;User:&lt;/label&gt;';
        $buffer .= "\n";
        $buffer .= $indent . '&lt;input type=&quot;text&quot; name=&quot;username&quot; /&gt;';
        $buffer .= "\n";
        $buffer .= $indent . '&lt;label for=&quot;body&quot;&gt;Body:&lt;/label&gt;';
        $buffer .= "\n";
        $buffer .= $indent . '&lt;textarea name=&quot;body&quot; cols=&quot;50&quot; rows=&quot;10&quot;&gt;&lt;/textarea&gt;';
        $buffer .= "\n";
        $buffer .= $indent . '&lt;input type=&quot;submit&quot; name=&quot;submit&quot; value=&quot;Submit&quot; /&gt;';
        $buffer .= "\n";
        $buffer .= $indent . '&lt;/form&gt;';
        $buffer .= "\n";

        return $buffer;
    }
}
