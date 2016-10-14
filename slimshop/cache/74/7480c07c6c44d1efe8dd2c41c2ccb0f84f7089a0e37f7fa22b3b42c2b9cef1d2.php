<?php

/* passreset_success.html.twig */
class __TwigTemplate_7e30e1f369a421c288e28e16436ec44beb83e0a608c61dbe43fc7b57e64d4b85 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("master.html.twig", "passreset_success.html.twig", 3);
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
        echo "    <h1>Password reset - email sent</h1>

   
        <p>Email with password reset code has been sent.
        Please folow email in a few minutes.</p>
        <a href=\"/\">Click here to continue</a>
           



";
    }

    public function getTemplateName()
    {
        return "passreset_success.html.twig";
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

{% block title %}Password reset{% endblock %}

{% block content %}
    <h1>Password reset - email sent</h1>

   
        <p>Email with password reset code has been sent.
        Please folow email in a few minutes.</p>
        <a href=\"/\">Click here to continue</a>
           



{% endblock %}
";
    }
}
