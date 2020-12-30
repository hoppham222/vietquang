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

/* sites/all/themes/giaidieu/templates/region/region--footer.html.twig */
class __TwigTemplate_91ff066678ef791875ec16a4a2a777228da3469b5c5db99c3f21654ee3779cac extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 21];
        $functions = ["drupal_menu" => 21, "drupal_entity" => 35];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['drupal_menu', 'drupal_entity']
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
        echo "<div class=\"footer-row \">
\t<div class=\"wapper_footer_top container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"footer_top_left col-md-6\">
\t\t\t\t<div class=\"menu_about_us_footer footer_top_item\">
\t\t\t\t\t<h3>Về chúng tôi <i class=\"fas fa-chevron-right\"></i></h3>
\t\t\t\t\t";
        // line 21
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalMenu("about-us"), "html", null, true));
        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"menu_product_footer_footer footer_top_item\">
\t\t\t\t\t<h3>Sản phẩm <i class=\"fas fa-chevron-right\"></i></h3>
\t\t\t\t\t";
        // line 25
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalMenu("product-footer"), "html", null, true));
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-md-6 footer_top_right\">
\t\t\t\t<div class=\" menu_policy_footer footer_top_item\">
\t\t\t\t\t<h3>Chính sách <i class=\"fas fa-chevron-right\"></i></h3>
\t\t\t\t\t";
        // line 31
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalMenu("chinh-sach"), "html", null, true));
        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\" block_hotline_footer footer_top_item\">
\t\t\t\t\t<h3>Hotline</h3>
\t\t\t\t\t";
        // line 35
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", "6"), "html", null, true));
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-xs-12 follow-us pull-left\">
\t\t\t\t";
        // line 39
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block", "socialmedialinks"), "html", null, true));
        echo "
\t\t\t\t<a href='/' class='certification'><img src=\"/sites/all/themes/giaidieu/images/mask-group-1.png\"
\t\t\t\t\t\talt=\"Đăng ký bộ công thương\" /></a>
\t\t\t</div>
\t\t</div>

\t</div>
\t<div class=\"copyright pull-right\">
\t\t";
        // line 47
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalEntity("block_content", "1"), "html", null, true));
        echo "
\t</div>

</div>

<div class=\"social-fixed\">
\t<div class=\"sroll-top\">
\t\t<i class=\"fa fa-chevron-up\" aria-hidden=\"true\"></i>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/region/region--footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 47,  93 => 39,  86 => 35,  79 => 31,  70 => 25,  63 => 21,  55 => 15,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/region/region--footer.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/region/region--footer.html.twig");
    }
}
