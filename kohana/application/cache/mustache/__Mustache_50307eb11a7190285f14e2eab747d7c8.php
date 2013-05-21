<?php

class __Mustache_50307eb11a7190285f14e2eab747d7c8 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<section class="comments" id="comments">';
        $buffer .= "\n";
        $buffer .= $indent . '    <section class="previous-comments">';
        $buffer .= "\n";
        $buffer .= $indent . '            <h3>Comments</h3>';
        $buffer .= "\n";
        // 'get_comments' section
        $buffer .= $this->sectionF1c0ce41c49adb079c1723fbe64c85da($context, $indent, $context->find('get_comments'));
        // 'get_comments' inverted section
        $value = $context->find('get_comments');
        if (empty($value)) {
            
            $buffer .= $indent . '        <p>There are no comments for this post. Be the first to comment...</p>';
            $buffer .= "\n";
        }
        $buffer .= $indent . '    </section>';
        $buffer .= "\n";
        if ($partial = $this->mustache->loadPartial('comments/form_add')) {
            $buffer .= $partial->renderInternal($context, '');
        }
        $buffer .= $indent . '</section>';
        $buffer .= "\n";

        return $buffer;
    }

    private function sectionF1c0ce41c49adb079c1723fbe64c85da(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <article class="comment {{cycle}}" id="comment-{{id}}">
        <header>
            <p><span class="highlight">{{user}}</span> commented <time datetime="{{created}}">{{created}}</time></p>
        </header>
        <p>{{comment}}</p>
         </article>
    ';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '    <article class="comment ';
                $value = $this->resolveValue($context->find('cycle'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" id="comment-';
                $value = $this->resolveValue($context->find('id'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $buffer .= "\n";
                $buffer .= $indent . '        <header>';
                $buffer .= "\n";
                $buffer .= $indent . '            <p><span class="highlight">';
                $value = $this->resolveValue($context->find('user'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</span> commented <time datetime="';
                $value = $this->resolveValue($context->find('created'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('created'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</time></p>';
                $buffer .= "\n";
                $buffer .= $indent . '        </header>';
                $buffer .= "\n";
                $buffer .= $indent . '        <p>';
                $value = $this->resolveValue($context->find('comment'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>';
                $buffer .= "\n";
                $buffer .= $indent . '         </article>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
