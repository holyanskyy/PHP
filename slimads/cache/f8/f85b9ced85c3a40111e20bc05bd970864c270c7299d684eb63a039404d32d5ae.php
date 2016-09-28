<?php

/* postad.html.twig */
class __TwigTemplate_098824506adb0dc583a595e779f15ff673438eb382eb077734065d737f55d249 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "postad.html.twig", 2);
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Post ad";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <h1>Post ad</h1>

    ";
        // line 10
        if ((isset($context["errorList"]) ? $context["errorList"] : null)) {
            // line 11
            echo "        <ul>
            ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errorList"]) ? $context["errorList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 13
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "        </ul>

    ";
        }
        // line 18
        echo "
    <form method=\"post\">
        Ad: <textarea name=\"msg\" rows=\"4\" cols=\"50\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "msg", array()), "html", null, true);
        echo "</textarea><br>
        Price: <input type=\"text\" name=\"price\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "price", array()), "html", null, true);
        echo "\"><br>
        Contact email: <input type=\"email\" name=\"contactEmail\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "contactEmail", array()), "html", null, true);
        echo "\"><br>


        <input type=\"submit\" value=\"Post ad\">

    </form>


";
    }

    public function getTemplateName()
    {
        return "postad.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 22,  74 => 21,  70 => 20,  66 => 18,  61 => 15,  52 => 13,  48 => 12,  45 => 11,  43 => 10,  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}
{% extends \"master.html.twig\"%}

{% block title %}Post ad{% endblock %}

{% block content %}

    <h1>Post ad</h1>

    {% if errorList %}
        <ul>
            {% for error in errorList %}
                <li>{{error}}</li>
                {% endfor %}
        </ul>

    {% endif %}

    <form method=\"post\">
        Ad: <textarea name=\"msg\" rows=\"4\" cols=\"50\">{{v.msg}}</textarea><br>
        Price: <input type=\"text\" name=\"price\" value=\"{{v.price}}\"><br>
        Contact email: <input type=\"email\" name=\"contactEmail\" value=\"{{v.contactEmail}}\"><br>


        <input type=\"submit\" value=\"Post ad\">

    </form>


{% endblock %}
";
    }
}
