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

/* sites/all/themes/giaidieu/templates/commerce/commerce-cart-block.html.twig */
class __TwigTemplate_98ef34ce8bf5332fc5805caea411a5f52bc98483328bba30e7f64355f5d8fa42 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 1, "if" => 4];
        $filters = ["replace" => 1, "escape" => 2];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['replace', 'escape'],
                []
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
        // line 1
        $context["item"] = twig_replace_filter($this->sandbox->ensureToStringAllowed(($context["count_text"] ?? null)), [" item" => "", " items" => ""]);
        // line 2
        echo "<div";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "shoping_cart_wapper"], "method")), "html", null, true));
        echo ">
  <div class=\"cart-block--summary\">
    ";
        // line 4
        if ((($context["item"] ?? null) > 0)) {
            // line 5
            echo "    <a class=\"cart-block--link__expand\" href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null)), "html", null, true));
            echo "\">
\t\t  <div class=\"icon_shoping_cart\">
\t\t    <img src=\"/sites/all/themes/giaidieu/images/icon/add-to-basket.png\" alt=\"Shoping cart\" />
\t\t  </div>
\t\t  <span class=\"amount_product\">";
            // line 9
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["item"] ?? null)), "html", null, true));
            echo "</span>
    </a>
    ";
        } else {
            // line 12
            echo "    <div class=\"icon_shoping_cart\">
      <img src=\"/sites/all/themes/giaidieu/images/icon/add-to-basket.png\" alt=\"Shoping cart\" title=\"Chưa có sản phẩm nào trong giỏ hàng\" />
    </div>
    ";
        }
        // line 16
        echo "  </div>
  ";
        // line 17
        if (($context["content"] ?? null)) {
            // line 18
            echo "  <div class=\"cart-block--contents\">
    <div class=\"cart-block--contents__inner\">
      <div class=\"cart-block--contents__items\">
        ";
            // line 21
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null)), "html", null, true));
            echo "
      </div>
      <div class=\"cart-block--contents__links\">
        <a href=\"/cart\" class=\"btn btn-primary btn-sm\">Xem báo giá</a>
      </div>
    </div>
  </div>
  ";
        }
        // line 29
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/commerce/commerce-cart-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 29,  95 => 21,  90 => 18,  88 => 17,  85 => 16,  79 => 12,  73 => 9,  65 => 5,  63 => 4,  57 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/commerce/commerce-cart-block.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/commerce/commerce-cart-block.html.twig");
    }
}
