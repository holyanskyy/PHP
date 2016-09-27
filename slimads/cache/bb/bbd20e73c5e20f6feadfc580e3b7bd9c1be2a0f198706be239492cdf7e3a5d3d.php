<?php

/* index.html.twig */
class __TwigTemplate_d2d5e3f51b723997dcf7f3e7c66db76fc51540911eda27c1e3553db0abe5e713 extends Twig_Template
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
        echo "<a href=\"http://localhost:8080/ipd8/slimads/index.php/postad\"> post ad </a>

";
        // line 4
        if ((isset($context["adList"]) ? $context["adList"] : null)) {
            // line 5
            echo "    <table border=\"1\">
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Price</th>
            <th>Contact email:</th>
             <th>Operations</th>
        </tr>

        ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["adList"]) ? $context["adList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["ad"]) {
                // line 15
                echo "            <tr>
                <td>";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "ID", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "msg", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "price", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "contactEmail", array()), "html", null, true);
                echo "</td>
                 <td><a href='index.php/postad/:";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "ID", array()), "html", null, true);
                echo "' >Edit</a></td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ad'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "
    </table>
";
        } else {
            // line 26
            echo "
    <p>There are no adds yet</p>

";
        }
        // line 30
        echo "

";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 30,  73 => 26,  68 => 23,  59 => 20,  55 => 19,  51 => 18,  47 => 17,  43 => 16,  40 => 15,  36 => 14,  25 => 5,  23 => 4,  19 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}
<a href=\"http://localhost:8080/ipd8/slimads/index.php/postad\"> post ad </a>

{% if adList %}
    <table border=\"1\">
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Price</th>
            <th>Contact email:</th>
             <th>Operations</th>
        </tr>

        {% for ad in adList %}
            <tr>
                <td>{{ ad.ID }}</td>
                <td>{{ ad.msg }}</td>
                <td>{{ ad.price }}</td>
                <td>{{ ad.contactEmail }}</td>
                 <td><a href='index.php/postad/:{{ad.ID}}' >Edit</a></td>
            </tr>
        {% endfor %}

    </table>
{% else %}

    <p>There are no adds yet</p>

{% endif %}


";
    }
}
