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

/* sites/all/themes/giaidieu/templates/pages/page--user.html.twig */
class __TwigTemplate_35bb56b8dc1ab442e4c093517d8cd539f93895295aa3c44ce019bd732f5fe2ad extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 50];
        $filters = ["escape" => 47];
        $functions = ["drupal_breadcrumb" => 54];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['drupal_breadcrumb']
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
        // line 44
        echo "<div id=\"page-wrapper\" class=\"clearfix\" onclick=\"custom_user_avatar_mouseout(this);\">
  <!-- Header -->
  <div id=\"header\" class=\"clearfix\">
    ";
        // line 47
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true));
        echo "
  </div>

  ";
        // line 50
        if ((($context["logged_in"] ?? null) && ($this->getAttribute(($context["account"] ?? null), "id", []) == $this->getAttribute(($context["user"] ?? null), "id", [])))) {
            // line 51
            echo "  <div class=\"management_user\">
  <!-- Breadcrumbs -->
\t  <div id=\"breadcrumbs\" class=\"clearfix\">
      <div class=\"container\">";
            // line 54
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBreadcrumb(), "html", null, true));
            echo "</div>
    </div>

    <div id=\"main\" class=\"clearfix\">
    <div class=\"container\">
      <div class=\"user_details\">
        <!-- User info -->
          <div class=\"user-profile\">
            <div class=\"avt\" onmouseover=\"custom_user_avatar_mouseover(this);\">
              <img id=\"user-avatar\" src=\"";
            // line 63
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["account_avatar"] ?? null)), "html", null, true));
            echo "\" alt=\"Avatar\" uid=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["user"] ?? null), "id", [])), "html", null, true));
            echo "\" />
              <input type=\"file\" name=\"file\" id=\"user-avatar-file\" accept=\".png, .gif, .jpg, .jpeg\" style=\"display: none;\" />
              <div id=\"user-avatar-op\" class=\"hide\">
                <span class=\"user-avatar-change\" onclick=\"custom_file_browse_trigger('user-avatar-file'); return false;\">Đổi ảnh</span>
                <span class=\"user-avatar-save hide\" onclick=\"custom_user_avatar_update(this); return false;\">Lưu ảnh</span>
              </div>
            </div>
            <div class=\"info\">
              <div class=\"name\">";
            // line 71
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["account_name"] ?? null)), "html", null, true));
            echo "</div>
            </div>
            <!-- Dang xuat -->
            <div class=\"menu-user-exit\"><a href=\"/user/logout\" class=\"btn btn-inline btn-sm btn-danger\" title=\"Đăng xuất khỏi hệ thống\"><i class=\"fas fa-sign-out-alt\"></i> Đăng xuất</a></div>
          </div>
      <!-- Sidebar -->
\t  \t<div class=\"sidebar-user col-md-3\">
\t  \t  <div class=\"block-menu-user sidebar-left\">       
          <!-- Quan ly tai khoan -->
\t\t      <div class=\"menu-user-profile\">
\t\t        <h3 class=\"menu-title\">Quản lý tài khoản</h3>
\t\t\t  \t  <ul class=\"items-list\">
              <li><i class=\"fa fa-user\" aria-hidden=\"true\"></i> <a href=\"/user/";
            // line 83
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["user"] ?? null), "id", [])), "html", null, true));
            echo "/edit\">Thông tin tài khoản</a></li>
              <li><i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i> <a href=\"/user/";
            // line 84
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["user"] ?? null), "id", [])), "html", null, true));
            echo "/orders\">Lịch sử báo giá</a></li>
              <!--<li><i class=\"fa fa-bell\" aria-hidden=\"true\"></i> <a href=\"/user/";
            // line 85
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["user"] ?? null), "id", [])), "html", null, true));
            echo "/thong-bao\">Thông báo của bạn</a></li>-->
            </ul>
\t\t      </div>
        <!-- Dang xuat -->
        
        </div>
      </div>
      <!-- Main -->
\t  \t<div class=\"main-content main-content-user col-md-9\">
        <h1 class=\"page-header\">";
            // line 94
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true));
            echo "</h1>
\t\t    ";
            // line 95
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true));
            echo "
      </div>
      </div>
    </div>
    </div>
  </div>
  ";
        } else {
            // line 102
            echo "  <div class=\"management_user_details\">
    <div id=\"breadcrumbs\" class=\"clearfix\">
      <div class=\"container\">";
            // line 104
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBreadcrumb(), "html", null, true));
            echo "</div>
    </div>
    <!-- Main content -->
 \t  <div id=\"main\" class=\"clearfix\">
      <div class=\"container\">
        ";
            // line 109
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true));
            echo "
      </div>
  </div>
  </div>
\t";
        }
        // line 114
        echo "
  <!-- Footer -->
  <div id=\"footer\" class=\"clearfix\">
    ";
        // line 117
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true));
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/pages/page--user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 117,  167 => 114,  159 => 109,  151 => 104,  147 => 102,  137 => 95,  133 => 94,  121 => 85,  117 => 84,  113 => 83,  98 => 71,  85 => 63,  73 => 54,  68 => 51,  66 => 50,  60 => 47,  55 => 44,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/pages/page--user.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/pages/page--user.html.twig");
    }
}
