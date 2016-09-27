<?php

/* postad.html.twig */
class __TwigTemplate_098824506adb0dc583a595e779f15ff673438eb382eb077734065d737f55d249 extends Twig_Template
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

<h1>Post ad</h1>

";
        // line 6
        if ((isset($context["errorList"]) ? $context["errorList"] : null)) {
            // line 7
            echo "    <ul>
        ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errorList"]) ? $context["errorList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 9
                echo "            <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "    </ul>

";
        }
        // line 14
        echo "
<form method=\"post\">
    Ad: <textarea name=\"msg\" rows=\"4\" cols=\"50\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "msg", array()), "html", null, true);
        echo "</textarea><br>
    Price: <input type=\"text\" name=\"price\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "price", array()), "html", null, true);
        echo "\"><br>
    Contact email: <input type=\"email\" name=\"contactEmail\" value=\"";
        // line 18
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
        return array (  60 => 18,  56 => 17,  52 => 16,  48 => 14,  43 => 11,  34 => 9,  30 => 8,  27 => 7,  25 => 6,  19 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}


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
";
    }
}
