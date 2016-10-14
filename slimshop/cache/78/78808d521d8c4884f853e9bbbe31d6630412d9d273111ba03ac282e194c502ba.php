<?php

/* email_passreset.html.twig */
class __TwigTemplate_e5a15499522df048e95667da6e56e20c847e4aba8a188dae51d6f24537fe009f extends Twig_Template
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
<html>
    <body>
        <h1>Password reset request</h1>
        <p>Hi ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</p>
        <p>You have requested a password reset</p>
        <p> Click on <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
        echo "\">this link</a> to reset your password
        or paste the following URL into a web browser</p>
        <p>";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["link"]) ? $context["link"] : null), "html", null, true);
        echo "</p>
        </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "email_passreset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 10,  30 => 8,  25 => 6,  19 => 2,);
    }

    public function getSource()
    {
        return "{# WARNING: this template is for an email, not an HTML page #}

<html>
    <body>
        <h1>Password reset request</h1>
        <p>Hi {{name}}</p>
        <p>You have requested a password reset</p>
        <p> Click on <a href=\"{{link}}\">this link</a> to reset your password
        or paste the following URL into a web browser</p>
        <p>{{link}}</p>
        </body>
</html>
";
    }
}
