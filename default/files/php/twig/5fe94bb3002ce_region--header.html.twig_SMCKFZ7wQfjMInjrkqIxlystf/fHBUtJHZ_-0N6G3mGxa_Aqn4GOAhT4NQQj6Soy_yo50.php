<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* sites/all/themes/giaidieu/templates/region/region--header.html.twig */
class __TwigTemplate_5647fb1c98e7ffe1dfc38878cb823166ee1d0df3a3c2366d265e8d6c9e7424ff extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 38];
        $filters = ["escape" => 21];
        $functions = ["drupal_entity" => 21, "drupal_block" => 27, "drupal_menu" => 63];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['drupal_entity', 'drupal_block', 'drupal_menu']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 15
        echo "<div class=\"header-row row-1\">
\t<div class=\"container header_top\">
\t\t<div class='wapper_header_top'>
\t\t\t<button class=\"header-menu_left__icon\" onclick=\"giaidieu_toogle_menu_left(this)\"><span></span></button>
\t\t\t<!-- Logo -->
\t\t\t<div class=\"logo-header\">
\t\t\t\t";
        // line 21
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block", "giaidieu_branding"), "html", null, true));
        echo "
\t\t\t</div>

\t\t\t<!-- Search -->
\t\t\t<div class=\"search-wrapper\">
\t\t\t\t<button class=\"header-search__icon\" onclick=\"giaidieu_toogle_search(this)\"><span></span></button>
\t\t\t\t";
        // line 27
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("views_exposed_filter_block:product_search_category-page_title_search"), "html", null, true));
        echo "
\t\t\t</div>

\t\t\t<!-- Hotline -->
\t\t\t<div class=\"wapper_header_top_right\">
\t\t\t\t<button class=\"header-menu_right__icon\" onclick=\"giaidieu_toogle_menu_right(this)\"><span></span></button>
\t\t\t\t<div class=\"header-menu_right\">
\t\t\t\t\t<div class=\"contact-hotline\">
\t\t\t\t\t\t<span class=\"phone-icon\"><i class=\"fas fa-phone-alt\" aria-hidden=\"true\"></i></span> <a href=\"tel:0935121010\">0935 12 10 10</a>
\t\t\t\t\t</div>
\t\t
\t\t\t\t\t";
        // line 38
        if (($context["logged_in"] ?? null)) {
            // line 39
            echo "\t\t\t\t\t<div  class=\"log-in\">
\t\t\t\t\t\t<img  src=\"";
            // line 40
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["account_avatar"] ?? null)), "html", null, true));
            echo "\" alt=\"Avatar\" class=\"user-avatar\" />
\t\t\t\t\t\t<span onclick=\"custom_user_account_menu_toggle(this);\" class='user_has_login'>Tài khoản</span>
\t\t\t\t\t\t<ul class=\"account-select\">
\t\t\t\t\t\t<li><a href=\"/user/";
            // line 43
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["user"] ?? null), "id", [])), "html", null, true));
            echo "/edit\"><i class=\"fas fa-user\"></i> ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["account"] ?? null), "field_full_name", []), "value", [])), "html", null, true));
            echo "</a></li>
\t\t\t\t\t\t<li><a href=\"/user/logout\" title=\"Đăng xuất khỏi hệ thống\"><i class=\"fas fa-sign-out-alt\"></i>Đăng xuất</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t";
        } else {
            // line 48
            echo "\t\t\t\t\t<div class=\"log-in\">
\t\t\t\t\t\t<span class=\"user-icon\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i></span>
\t\t\t\t\t\t<a href=\"/user/login\" onclick=\"custom_user_login_popup(); return false;\" title=\"Đăng nhập thành viên\">Đăng nhập</a>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 53
        echo "\t\t\t\t</div>
\t\t\t\t<!-- shoping cart -->
\t\t\t\t";
        // line 55
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block", "cart"), "html", null, true));
        echo "
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<div class=\"header-row row-2\">
\t<div class=\"container header_bottom\">
\t\t<!-- Main menu -->
\t\t";
        // line 63
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalMenu("main"), "html", null, true));
        echo "
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/region/region--header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 63,  118 => 55,  114 => 53,  107 => 48,  97 => 43,  91 => 40,  88 => 39,  86 => 38,  72 => 27,  63 => 21,  55 => 15,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/region/region--header.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/region/region--header.html.twig");
    }
}
