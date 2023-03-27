<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* mark/index.html.twig */
class __TwigTemplate_c62d6f868bef40f96375595ba59e7b15 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mark/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mark/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "mark/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Marks";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <style>
        .add-subject {
            display: none;
        }
        .mark_value {
            max-width: 2em;
            text-align: center;
        }
        .addMarkBtn {
            max-height: 2.17em;
            margin-bottom: 0.3em;
        }
        .input_mark {
            display: none;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 24
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 25
        echo "    <h1><a href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("profile", ["name" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 25, $this->source); })()), "username", [], "any", false, false, false, 25)]), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 25, $this->source); })()), "username", [], "any", false, false, false, 25), "html", null, true);
        echo "</a> marks</h1>
    ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "flashes", [0 => "error"], "method", false, false, false, 26));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 27
            echo "        <div class=\"alert alert-danger\">
            ";
            // line 28
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "    ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 32
            echo "        <form action=\"\" method=\"post\">
    ";
        }
        // line 34
        echo "    <table class=\"table table-striped\">
        <thead>
        <tr>
            <td>Subject</td>
            <td>Marks</td>
            <td>Average</td>
        </tr>
        </thead>
        <tbody>
        ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($context["marks"]);
        foreach ($context['_seq'] as $context["subject"] => $context["marks"]) {
            // line 44
            echo "            <tr>
                <td>";
            // line 45
            echo twig_escape_filter($this->env, $context["subject"], "html", null, true);
            echo "</td>
                <td>
                    ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["marks"]);
            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                // line 48
                echo "                        ";
                if ((twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 48) == "i")) {
                    // line 49
                    echo "                            <button type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 49), "html", null, true);
                    echo "\">
                        ";
                } else {
                    // line 51
                    echo "                            ";
                    if ((((twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 51) == "nv") || (twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 51) == "ni")) || (twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 51) < 4))) {
                        // line 52
                        echo "                                <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 52), "html", null, true);
                        echo "\">
                            ";
                    } else {
                        // line 54
                        echo "
                            <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#";
                        // line 55
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 55), "html", null, true);
                        echo "\">
                                ";
                    }
                    // line 57
                    echo "                        ";
                }
                // line 58
                echo "                            ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 58), "html", null, true);
                echo "
                        </button>
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"";
                // line 61
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 61), "html", null, true);
                echo "\" tabindex=\"-1\" role=\"dialog\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <h5 class=\"modal-title\">Mark</h5>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                    </div>
                                    <div class=\"modal-body\">
                                        ";
                // line 71
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                    // line 72
                    echo "                                            Value: <input name=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 72), "html", null, true);
                    echo "\" class=\"mark_value\" type=\"text\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 72), "html", null, true);
                    echo "\" maxlength=\"2\">
                                        ";
                } else {
                    // line 74
                    echo "                                            Value: ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "value", [], "any", false, false, false, 74), "html", null, true);
                    echo "
                                        ";
                }
                // line 76
                echo "                                        <br>
                                        Date: ";
                // line 77
                if ((twig_get_attribute($this->env, $this->source, $context["value"], "date", [], "any", false, false, false, 77) == null)) {
                    echo " null ";
                } else {
                    echo " ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["value"], "date", [], "any", false, false, false, 77), "d-m-Y"), "html", null, true);
                    echo " ";
                }
                // line 78
                echo "                                        <br>
                                        Teacher: ";
                // line 79
                if ((twig_get_attribute($this->env, $this->source, $context["value"], "teacher", [], "any", false, false, false, 79) != null)) {
                    echo " ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["value"], "teacher", [], "any", false, false, false, 79), "username", [], "any", false, false, false, 79), "html", null, true);
                    echo " ";
                } else {
                    echo " null ";
                }
                // line 80
                echo "                                    </div>
                                    <div class=\"modal-footer\">
                                        ";
                // line 82
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                    // line 83
                    echo "                                            <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("removeMark", ["id" => twig_get_attribute($this->env, $this->source, $context["value"], "id", [], "any", false, false, false, 83), "uid" => (isset($context["uid"]) || array_key_exists("uid", $context) ? $context["uid"] : (function () { throw new RuntimeError('Variable "uid" does not exist.', 83, $this->source); })())]), "html", null, true);
                    echo "\" class=\"btn btn-danger\">Delete mark</a>
                                            <button name=\"save\" type=\"submit\" class=\"btn btn-primary\">Save changes</button>
                                        ";
                }
                // line 86
                echo "                                    </div>
                                </div>
                            </div>
                        </div>
";
                // line 92
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "                    ";
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 96
                echo "                        <button type=\"button\" class=\"btn btn-outline-secondary\" data-toggle=\"modal\" data-target=\"#";
                echo twig_escape_filter($this->env, $context["subject"], "html", null, true);
                echo "\">
                            +
                        </button>
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"";
                // line 100
                echo twig_escape_filter($this->env, $context["subject"], "html", null, true);
                echo "\" tabindex=\"-1\" role=\"dialog\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\">Mark</h5>
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                <span aria-hidden=\"true\">&times;</span>
                                            </button>
                                        </div>
                                    <div class=\"modal-body\">
                                        <input name=\"v_";
                // line 110
                echo twig_escape_filter($this->env, $context["subject"], "html", null, true);
                echo "\" class=\"mark_value\" type=\"text\" maxlength=\"2\">
                                        <br>
                                        <input name=\"d_";
                // line 112
                echo twig_escape_filter($this->env, $context["subject"], "html", null, true);
                echo "\" type=\"date\">
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button name=\"save\" type=\"submit\" class=\"btn btn-primary\">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 121
            echo "                </td>
                <td>
                    ";
            // line 123
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["avg"]) || array_key_exists("avg", $context) ? $context["avg"] : (function () { throw new RuntimeError('Variable "avg" does not exist.', 123, $this->source); })()), $context["subject"], [], "array", false, false, false, 123), "html", null, true);
            echo "
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['subject'], $context['marks'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        echo "        </tbody>
    </table>
    ";
        // line 129
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 130
            echo "        </form>
    ";
        }
        // line 132
        echo "
    ";
        // line 133
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 134
            echo "        <button id=\"addSubject\" class=\"btn btn-primary\">Add subject</button>
        <div id=\"formAddSubject\" class=\"form add-subject\">
            ";
            // line 136
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 136, $this->source); })()), 'form');
            echo "
        </div>
    ";
        }
        // line 139
        echo "
";
        // line 141
        echo "    <script>
        const btnAddSubject = document.getElementById(\"addSubject\");
        const form = document.getElementById(\"formAddSubject\");
        btnAddSubject.addEventListener(\"click\", function() {
            if(form.style.display === \"block\") {
                form.style.display = \"none\";
            } else {
                form.style.display = \"block\";
            }
        });

        const btnAddMark = document.querySelector(\".addMarkBtn\");
        const inputMark = document.querySelector(\".input_mark\");
        btnAddMark.addEventListener(\"click\", function() {
            inputMark.style.display = \"inline\";
            btnAddMark.style.display = \"none\";
        });
    </script>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "mark/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  377 => 141,  374 => 139,  368 => 136,  364 => 134,  362 => 133,  359 => 132,  355 => 130,  353 => 129,  349 => 127,  339 => 123,  335 => 121,  323 => 112,  318 => 110,  305 => 100,  297 => 96,  294 => 95,  288 => 92,  282 => 86,  275 => 83,  273 => 82,  269 => 80,  261 => 79,  258 => 78,  250 => 77,  247 => 76,  241 => 74,  233 => 72,  231 => 71,  218 => 61,  211 => 58,  208 => 57,  203 => 55,  200 => 54,  194 => 52,  191 => 51,  185 => 49,  182 => 48,  178 => 47,  173 => 45,  170 => 44,  166 => 43,  155 => 34,  151 => 32,  148 => 31,  139 => 28,  136 => 27,  132 => 26,  125 => 25,  115 => 24,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Marks{% endblock %}

{% block stylesheets %}
    <style>
        .add-subject {
            display: none;
        }
        .mark_value {
            max-width: 2em;
            text-align: center;
        }
        .addMarkBtn {
            max-height: 2.17em;
            margin-bottom: 0.3em;
        }
        .input_mark {
            display: none;
        }
    </style>
{% endblock %}

{% block body %}
    <h1><a href=\"{{ path('profile', {name: user.username}) }}\">{{ user.username }}</a> marks</h1>
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">
            {{ message }}
        </div>
    {% endfor %}
    {% if is_granted('ROLE_ADMIN') %}
        <form action=\"\" method=\"post\">
    {% endif %}
    <table class=\"table table-striped\">
        <thead>
        <tr>
            <td>Subject</td>
            <td>Marks</td>
            <td>Average</td>
        </tr>
        </thead>
        <tbody>
        {% for subject, marks in marks %}
            <tr>
                <td>{{ subject }}</td>
                <td>
                    {% for value in marks %}
                        {% if value.value == 'i' %}
                            <button type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#{{ value.id }}\">
                        {% else %}
                            {% if value.value == 'nv' or value.value == 'ni' or value.value < 4 %}
                                <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#{{ value.id }}\">
                            {% else %}

                            <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#{{ value.id }}\">
                                {% endif %}
                        {% endif %}
                            {{ value.value }}
                        </button>
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"{{ value.id }}\" tabindex=\"-1\" role=\"dialog\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <h5 class=\"modal-title\">Mark</h5>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                    </div>
                                    <div class=\"modal-body\">
                                        {% if is_granted('ROLE_ADMIN') %}
                                            Value: <input name=\"{{ value.id }}\" class=\"mark_value\" type=\"text\" value=\"{{ value.value }}\" maxlength=\"2\">
                                        {% else %}
                                            Value: {{ value.value }}
                                        {% endif %}
                                        <br>
                                        Date: {% if value.date == null %} null {% else %} {{ value.date|date('d-m-Y') }} {% endif %}
                                        <br>
                                        Teacher: {% if value.teacher != null %} {{ value.teacher.username }} {% else %} null {% endif %}
                                    </div>
                                    <div class=\"modal-footer\">
                                        {% if is_granted('ROLE_ADMIN') %}
                                            <a href=\"{{ path('removeMark', {id: value.id, uid: uid}) }}\" class=\"btn btn-danger\">Delete mark</a>
                                            <button name=\"save\" type=\"submit\" class=\"btn btn-primary\">Save changes</button>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                        </div>
{#                            <input name=\"{{ value.id }}\" class=\"mark_value\" type=\"text\" value=\"{{ value.value }}\" maxlength=\"2\">#}
{#                            |#}
                    {% endfor %}
{#                    <btn class=\"addMarkBtn btn btn-outline-secondary btn-sm\">+</btn>#}
{#                    <input name=\"{{ subject }}\" class=\"input_mark mark_value\" type=\"text\">#}
                    {% if is_granted('ROLE_ADMIN') %}
                        <button type=\"button\" class=\"btn btn-outline-secondary\" data-toggle=\"modal\" data-target=\"#{{ subject }}\">
                            +
                        </button>
                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"{{ subject }}\" tabindex=\"-1\" role=\"dialog\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <h5 class=\"modal-title\">Mark</h5>
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                <span aria-hidden=\"true\">&times;</span>
                                            </button>
                                        </div>
                                    <div class=\"modal-body\">
                                        <input name=\"v_{{ subject }}\" class=\"mark_value\" type=\"text\" maxlength=\"2\">
                                        <br>
                                        <input name=\"d_{{ subject }}\" type=\"date\">
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button name=\"save\" type=\"submit\" class=\"btn btn-primary\">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {% endif %}
                </td>
                <td>
                    {{ avg[subject] }}
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
    {% if is_granted('ROLE_ADMIN') %}
        </form>
    {% endif %}

    {% if is_granted('ROLE_ADMIN') %}
        <button id=\"addSubject\" class=\"btn btn-primary\">Add subject</button>
        <div id=\"formAddSubject\" class=\"form add-subject\">
            {{ form(form) }}
        </div>
    {% endif %}

{#    JavaScript#}
    <script>
        const btnAddSubject = document.getElementById(\"addSubject\");
        const form = document.getElementById(\"formAddSubject\");
        btnAddSubject.addEventListener(\"click\", function() {
            if(form.style.display === \"block\") {
                form.style.display = \"none\";
            } else {
                form.style.display = \"block\";
            }
        });

        const btnAddMark = document.querySelector(\".addMarkBtn\");
        const inputMark = document.querySelector(\".input_mark\");
        btnAddMark.addEventListener(\"click\", function() {
            inputMark.style.display = \"inline\";
            btnAddMark.style.display = \"none\";
        });
    </script>

{% endblock %}", "mark/index.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/sfcoursev2/templates/mark/index.html.twig");
    }
}
