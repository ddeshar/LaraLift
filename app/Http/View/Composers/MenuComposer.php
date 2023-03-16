<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class MenuComposer
{
    public function compose(View $view)
    {
        $menu = Cache::remember('menu', 86400, function () {
            return json_decode(File::get(resource_path('json/menu.json')), true);
        });

        // Get the current user's role
        $userRole = auth()->user()->roles->first()->name;
        $menuHtml = $this->generateMenuHtml($menu, $userRole);
    
        $view->with('menuHtml', $menuHtml);
    }
    
    private function generateMenuHtml(array $menuItems, $role): string
    {
        $html = '';
    
        foreach ($menuItems as $item) {
            // Skip items that aren't visible or don't match the role
            if (!$item['visible'] || !in_array($role, $item['roles'])) {
                continue;
            }
    
            // If the item has children, generate the child menu items
            if (!empty($item['children'])) {
                $html .= '<li class="sidebar-menu-item">';
                $html .= '<a href="#">';
                $html .= '<i class="' . $item['icon'] . '"></i> <span>' . $item['title'] . '</span> <i class="fa fa-angle-left pull-right"></i>';
                $html .= '</a>';
                $html .= '<ul class="sidebar-submenu">';
                $html .= $this->generateMenuHtml($item['children'], $role);
                $html .= '</ul>';
                $html .= '</li>';
            } else {
                // Generate the menu item
                $html .= '<li class="sidebar-menu-item">';
                if ($item['is_external']) {
                    $html .= '<a href="' . $item['route_name'] . '" class="menu-link" target="_blank">';
                } else {
                    $html .= '<a href="' . route($item['route_name']) . '" class="menu-link">';
                }
                $html .= '<i class="' . $item['icon'] . '"></i> <span class="menu-title">' . $item['title'] . '</span>';
                if (!empty($item['label'])) {
                    $html .= '<small class="label pull-right ' . $item['label_class'] . '">' . $item['label'] . '</small>';
                }
                $html .= '</a>';
                $html .= '</li>';
            }
        }
    
        return $html;
    }    
}
