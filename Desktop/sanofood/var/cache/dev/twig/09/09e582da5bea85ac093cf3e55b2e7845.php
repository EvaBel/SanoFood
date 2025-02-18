<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* commande/index.html.twig */
class __TwigTemplate_549c265f0b43527683afd3e92fcab8e7 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "commande/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        yield "<div class=\"content-page\">
    <div class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Liste des commande</h5>

                            <!-- Formulaire de recherche -->
                            <form action=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("afficher_commande");
        yield "\" method=\"GET\">
                                <div class=\"form-group\">
                                    <label for=\"search\">Rechercher par titre, type ou total :</label>
                                    <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "query", [], "any", false, false, false, 17), "get", ["search"], "method", false, false, false, 17), "html", null, true);
        yield "\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-primary\">Rechercher</button>
                            </form>
                            <!-- Fin du formulaire de recherche -->

                            <!-- Tableau des commande filtrées -->
                            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["Commande"]) || array_key_exists("Commande", $context) ? $context["Commande"] : (function () { throw new RuntimeError('Variable "Commande" does not exist.', 24, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["recl"]) {
            // line 25
            yield "                            <div class=\"card mb-3\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-subtitle mb-2 text-muted\">Nom: ";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "titre", [], "any", false, false, false, 27), "html", null, true);
            yield "</h5>
                                    <h7 class=\"card-subtitle mb-2 text-muted\">Créé le: ";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "datecreation", [], "any", false, false, false, 28), "d-m-Y"), "html", null, true);
            yield "</h7>
                                    <p class=\"card-text\">total: ";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "total", [], "any", false, false, false, 29), "html", null, true);
            yield "</p>
                                    <img src=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "image", [], "any", false, false, false, 30))), "html", null, true);
            yield "\" style=\"width:80px; height:80px;\" />
                                    
                                    <!-- Formulaire d'envoi de message -->
                                    <form action=\"";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("livrer", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "id", [], "any", false, false, false, 33)]), "html", null, true);
            yield "\" method=\"commande\">
                                        <button type=\"submit\" class=\"btn btn-primary\">Livrer</button>
                                    </form>

                                    <div class=\"btn-group\" role=\"group\" aria-label=\"Actions\">
                                       

                                    </div>
                                </div>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['recl'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        yield "                            <!-- Fin du tableau des commande filtrées -->

                            <!-- Pagination -->
                            <div class=\"pagination\">
                                ";
        // line 48
        $context["currentPage"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["Commande"]) || array_key_exists("Commande", $context) ? $context["Commande"] : (function () { throw new RuntimeError('Variable "Commande" does not exist.', 48, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 48);
        // line 49
        yield "                                ";
        $context["previous"] = ((((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 49, $this->source); })()) > 1)) ? (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 49, $this->source); })()) - 1)) : (false));
        // line 50
        yield "                                ";
        $context["next"] = ((((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 50, $this->source); })()) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["Commande"]) || array_key_exists("Commande", $context) ? $context["Commande"] : (function () { throw new RuntimeError('Variable "Commande" does not exist.', 50, $this->source); })()), "pageCount", [], "any", false, false, false, 50))) ? (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 50, $this->source); })()) + 1)) : (false));
        // line 51
        yield "                                <ul class=\"pagination\">
                                    ";
        // line 52
        if ((isset($context["previous"]) || array_key_exists("previous", $context) ? $context["previous"] : (function () { throw new RuntimeError('Variable "previous" does not exist.', 52, $this->source); })())) {
            // line 53
            yield "                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"";
            // line 54
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("afficher_commande");
            yield "?page=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["previous"]) || array_key_exists("previous", $context) ? $context["previous"] : (function () { throw new RuntimeError('Variable "previous" does not exist.', 54, $this->source); })()), "html", null, true);
            yield "\">Précédent</a>
                                        </li>
                                    ";
        }
        // line 57
        yield "                                    <li class=\"page-item active\">
                                        <span class=\"page-link\">";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 58, $this->source); })()), "html", null, true);
        yield "</span>
                                    </li>
                                    ";
        // line 60
        if ((isset($context["next"]) || array_key_exists("next", $context) ? $context["next"] : (function () { throw new RuntimeError('Variable "next" does not exist.', 60, $this->source); })())) {
            // line 61
            yield "                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"";
            // line 62
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("afficher_commande");
            yield "?page=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["next"]) || array_key_exists("next", $context) ? $context["next"] : (function () { throw new RuntimeError('Variable "next" does not exist.', 62, $this->source); })()), "html", null, true);
            yield "\">Suivant</a>
                                        </li>
                                    ";
        }
        // line 65
        yield "                                </ul>
                            </div>
                            <!-- Fin de la pagination -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "commande/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  198 => 65,  190 => 62,  187 => 61,  185 => 60,  180 => 58,  177 => 57,  169 => 54,  166 => 53,  164 => 52,  161 => 51,  158 => 50,  155 => 49,  153 => 48,  147 => 44,  130 => 33,  124 => 30,  120 => 29,  116 => 28,  112 => 27,  108 => 25,  104 => 24,  94 => 17,  88 => 14,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block  body%}
<div class=\"content-page\">
    <div class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Liste des commande</h5>

                            <!-- Formulaire de recherche -->
                            <form action=\"{{ path('afficher_commande') }}\" method=\"GET\">
                                <div class=\"form-group\">
                                    <label for=\"search\">Rechercher par titre, type ou total :</label>
                                    <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" value=\"{{ app.request.query.get('search') }}\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-primary\">Rechercher</button>
                            </form>
                            <!-- Fin du formulaire de recherche -->

                            <!-- Tableau des commande filtrées -->
                            {% for recl in Commande %}
                            <div class=\"card mb-3\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-subtitle mb-2 text-muted\">Nom: {{ recl.titre }}</h5>
                                    <h7 class=\"card-subtitle mb-2 text-muted\">Créé le: {{ recl.datecreation|date('d-m-Y') }}</h7>
                                    <p class=\"card-text\">total: {{ recl.total }}</p>
                                    <img src=\"{{ asset('uploads/images/' ~ recl.image) }}\" style=\"width:80px; height:80px;\" />
                                    
                                    <!-- Formulaire d'envoi de message -->
                                    <form action=\"{{ path('livrer', {'id': recl.id}) }}\" method=\"commande\">
                                        <button type=\"submit\" class=\"btn btn-primary\">Livrer</button>
                                    </form>

                                    <div class=\"btn-group\" role=\"group\" aria-label=\"Actions\">
                                       

                                    </div>
                                </div>
                            </div>
                            {% endfor %}
                            <!-- Fin du tableau des commande filtrées -->

                            <!-- Pagination -->
                            <div class=\"pagination\">
                                {% set currentPage = Commande.currentPageNumber %}
                                {% set previous = currentPage > 1 ? currentPage - 1 : false %}
                                {% set next = currentPage < Commande.pageCount ? currentPage + 1 : false %}
                                <ul class=\"pagination\">
                                    {% if previous %}
                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"{{ path('afficher_commande') }}?page={{ previous }}\">Précédent</a>
                                        </li>
                                    {% endif %}
                                    <li class=\"page-item active\">
                                        <span class=\"page-link\">{{ currentPage }}</span>
                                    </li>
                                    {% if next %}
                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"{{ path('afficher_commande') }}?page={{ next }}\">Suivant</a>
                                        </li>
                                    {% endif %}
                                </ul>
                            </div>
                            <!-- Fin de la pagination -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "commande/index.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\safwen_yahya_symfony\\symfony_crud_safwen_yahya\\templates\\commande\\index.html.twig");
    }
}
