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
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 12
        echo "    </head>
    <body>
        <div id=\"centerContent\">
            <div id=\"content\">";
        // line 15
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

    // line 10
    public function block_head($context, array $blocks = array())
    {
        // line 11
        echo "        ";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "master.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  66 => 15,  62 => 11,  59 => 10,  54 => 8,  42 => 15,  37 => 12,  35 => 10,  30 => 8,  22 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}

<!DOCTYPE html>
<html>
    <head>

        <link rel=\"stylesheet\" href=\"/styles.css\" />
        <title>{% block title %}{% endblock %}</title>
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
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
