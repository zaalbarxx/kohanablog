<?php

class __Mustache_4dd4f648e1baaf1c73735079aaf98c34 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'blogs' section
        $buffer .= $this->sectionDc1f2f018614b97298262242e4b5de36($context, $indent, $context->find('blogs'));
        // 'blogs' inverted section
        $value = $context->find('blogs');
        if (empty($value)) {
            
            $buffer .= $indent . '        <p>There are no blog entries for symblog</p>';
            $buffer .= "\n";
        }

        return $buffer;
    }

    private function sectionDc1f2f018614b97298262242e4b5de36(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <article class="blog">
            <div class="date"><time datetime="{{created}}">{{created}}</time></div>
            <header>
                <h2><a href="{{url}}">{{title}}</a></h2>
            </header>

            <div class="snippet">
                <p>{{blog}}</p>
                <p class="continue"><a href="{{url}}">Continue reading...</a></p>
            </div>
            <footer class="meta">
                <p>Comments: <a href="{{url}}#comments">{{comments}}</a></p>
                <p>Posted by <span class="highlight">{{author}}</span> at {{created}}</p>
                <p>Tags: <span class="highlight">{{tags}}</span></p>
            </footer>
        </article>
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . '        <article class="blog">';
                $buffer .= "\n";
                $buffer .= $indent . '            <div class="date"><time datetime="';
                $value = $this->resolveValue($context->find('created'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('created'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</time></div>';
                $buffer .= "\n";
                $buffer .= $indent . '            <header>';
                $buffer .= "\n";
                $buffer .= $indent . '                <h2><a href="';
                $value = $this->resolveValue($context->find('url'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('title'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a></h2>';
                $buffer .= "\n";
                $buffer .= $indent . '            </header>';
                $buffer .= "\n";
                $buffer .= $indent . '';
                $buffer .= "\n";
                $buffer .= $indent . '            <div class="snippet">';
                $buffer .= "\n";
                $buffer .= $indent . '                <p>';
                $value = $this->resolveValue($context->find('blog'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>';
                $buffer .= "\n";
                $buffer .= $indent . '                <p class="continue"><a href="';
                $value = $this->resolveValue($context->find('url'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">Continue reading...</a></p>';
                $buffer .= "\n";
                $buffer .= $indent . '            </div>';
                $buffer .= "\n";
                $buffer .= $indent . '            <footer class="meta">';
                $buffer .= "\n";
                $buffer .= $indent . '                <p>Comments: <a href="';
                $value = $this->resolveValue($context->find('url'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '#comments">';
                $value = $this->resolveValue($context->find('comments'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a></p>';
                $buffer .= "\n";
                $buffer .= $indent . '                <p>Posted by <span class="highlight">';
                $value = $this->resolveValue($context->find('author'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</span> at ';
                $value = $this->resolveValue($context->find('created'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>';
                $buffer .= "\n";
                $buffer .= $indent . '                <p>Tags: <span class="highlight">';
                $value = $this->resolveValue($context->find('tags'), $context, $indent);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</span></p>';
                $buffer .= "\n";
                $buffer .= $indent . '            </footer>';
                $buffer .= "\n";
                $buffer .= $indent . '        </article>';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
