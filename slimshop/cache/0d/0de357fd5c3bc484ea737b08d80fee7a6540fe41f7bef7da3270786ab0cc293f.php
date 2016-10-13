<?php

/* passreset.html.twig */
class __TwigTemplate_001e430d46164fe2d7f9191ef5a5468ce9742d901eb97c20d2a8673a1e9c4640 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("master.html.twig", "passreset.html.twig", 3);
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
        echo "Password reset";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <h1>Password reset</h1>

    ";
        // line 10
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 11
            echo "        <p><b>We could not find email you provided in our system.
                try again or register a new account</b></p>
            ";
        }
        // line 14
        echo "
    <form method=\"POST\">
        Enter your email: <input type=\"email\" name=\"email\"><br>
        <input type=\"submit\" value=\"request password reset\">

    </form>



";
    }

    public function getTemplateName()
    {
        return "passreset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 14,  44 => 11,  42 => 10,  38 => 8,  35 => 7,  29 => 5,  11 => 3,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}

{% extends \"master.html.twig\"%}

{% block title %}Password reset{% endblock %}

{% block content %}
    <h1>Password reset</h1>

    {%  if error %}
        <p><b>We could not find email you provided in our system.
                try again or register a new account</b></p>
            {% endif %}

    <form method=\"POST\">
        Enter your email: <input type=\"email\" name=\"email\"><br>
        <input type=\"submit\" value=\"request password reset\">

    </form>



{% endblock %}
";
    }
}
