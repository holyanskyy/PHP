<?php

/* register.html.twig */
class __TwigTemplate_6dcbfbef8680eb5749561f2918a57e1454486c76e390c1099c3f8ad5c10dc67f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "

<h1>Register user</h1>
<form method=\"post\">
    Name: <input type=\"text\" name=\"name\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "name", array()), "html", null, true);
        echo "\"<br>
    Email: <input type=\"text\" name=\"email\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "email", array()), "html", null, true);
        echo "\"><br>
    Password: <input type=\"password\" name=\"pass1\"><br>
    Password (repeated): <input type=\"password\" name=\"pass2\"><br>
    <input type=\"submit\" value=\"Register\">
</form>
";
    }

    public function getTemplateName()
    {
        return "register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 7,  25 => 6,  19 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}


<h1>Register user</h1>
<form method=\"post\">
    Name: <input type=\"text\" name=\"name\" value=\"{{v.name}}\"<br>
    Email: <input type=\"text\" name=\"email\" value=\"{{v.email}}\"><br>
    Password: <input type=\"password\" name=\"pass1\"><br>
    Password (repeated): <input type=\"password\" name=\"pass2\"><br>
    <input type=\"submit\" value=\"Register\">
</form>
";
    }
}
