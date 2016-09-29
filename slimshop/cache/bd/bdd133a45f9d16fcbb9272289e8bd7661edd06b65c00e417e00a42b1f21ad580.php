<?php

/* login.html.twig */
class __TwigTemplate_f7ecf66f5a40c3b78bc3fb6d44c34bfee83177cb08b84c5df3077cc5258601ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("master.html.twig", "login.html.twig", 3);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Login";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<h1>Login</h1>
<form method=\"post\">
    Email: <input type=\"text\" name=\"email\"><br><br>
    Password: <input type=\"password\" name=\"password\"><br><br>
    <input type=\"submit\" value=\"Login\"><br><br>
</form>


    
";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 8,  35 => 7,  29 => 5,  11 => 3,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}

{% extends \"master.html.twig\"%}

{% block title %}Login{% endblock %}

{% block content %}

<h1>Login</h1>
<form method=\"post\">
    Email: <input type=\"text\" name=\"email\"><br><br>
    Password: <input type=\"password\" name=\"password\"><br><br>
    <input type=\"submit\" value=\"Login\"><br><br>
</form>


    
{% endblock %}";
    }
}
