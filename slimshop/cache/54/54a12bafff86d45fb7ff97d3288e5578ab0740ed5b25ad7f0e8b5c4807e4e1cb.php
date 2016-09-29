<?php

/* master.html.twig */
class __TwigTemplate_7a707a449d7ce7f2c374feadf160afc6deb3277444120b679939ebd9c29b2851 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<html>
    <head>

        <link rel=\"stylesheet\" href=\"/styles.css\" />
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 9
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <div id=\"centerContent\">
            <div id=\"content\">";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
            <div id=\"footer\">
                &copy; Copyright 2016 by Nazar</a>.            
            </div>
        </div>
    </body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "        ";
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "master.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  65 => 14,  61 => 10,  58 => 9,  53 => 8,  41 => 14,  36 => 11,  34 => 9,  30 => 8,  22 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}

<!DOCTYPE html>
<html>
    <head>

        <link rel=\"stylesheet\" href=\"/styles.css\" />
        <title>{% block title %}{% endblock %}</title>
        {% block head %}
        {% endblock %}
    </head>
    <body>
        <div id=\"centerContent\">
            <div id=\"content\">{% block content %}{% endblock %}</div>
            <div id=\"footer\">
                &copy; Copyright 2016 by Nazar</a>.            
            </div>
        </div>
    </body>
</html>
";
    }
}
