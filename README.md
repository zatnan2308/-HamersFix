# HamersFix — WordPress Theme

Custom **classic** WordPress theme for **HamersFix Appliance Repair** (Northeast Georgia, US), implementing the Claude Design handoff pixel-for-pixel. All visible text and images are editable through **ACF Pro**, and the homepage **ZIP coverage checker is fully functional** (it replaces the fake one in the mock).

## Requirements
- WordPress 6.0+
- PHP 7.4+
- **Advanced Custom Fields PRO** — the theme shows an admin notice if it is missing.

The theme renders correctly **even before any content is entered**: every field falls back to the design defaults baked into `inc/defaults.php`. The moment you fill a field under *Theme Settings* (or a page/service), your value takes over.

## Install
1. Place this folder at `wp-content/themes/hamersfix` (the repo root **is** the theme root).
2. Install & activate **ACF Pro**.
3. Activate **HamersFix** under *Appearance → Themes*.
4. *Settings → Permalinks* → choose **Post name** (`/%postname%/`).
5. *Settings → Reading* → set a **static front page** if you want to edit the homepage hero/section copy in the page editor (the homepage renders via `front-page.php` either way).
6. Edit global content under **Theme Settings** (phone, hours, ZIP codes, footer, etc.).
7. Add the six **Services** (CPT) — they automatically populate the *Residential* mega-menu and the homepage services grid.

## Deploy to Hostinger (git over SSH)
On the server, inside `wp-content/themes/`:

```bash
git clone git@github.com:zatnan2308/-HamersFix.git hamersfix
```

Updates: `git pull`. The `/design` reference bundle is git-ignored and is never deployed.

## Structure
```
assets/css/   tokens · site · menu · responsive (design system, as-is) + theme.css (WP glue, .ic-stroke, ZIP-checker states)
assets/js/    nav.js (mega + drawer + header shadow) · scroll-top.js · zip-checker.js (real checker)
inc/          setup · enqueue · helpers · defaults · cpt · nav-mega · zip-checker · seo · schema · acf
inc/acf-fields/  options-global · page-home · cpt-service  (field groups registered in code → versioned in git)
template-parts/  header chrome, footer, drawer + section/* (homepage sections)
front-page.php   homepage (mirrors mocks/Home-desktop.html)
```

## Implemented
Homepage (`Home-desktop.html`) · global header/footer/drawer/mega-menu · working ZIP checker · ACF Options & Home fields · `service` CPT · LocalBusiness + FAQPage JSON-LD · meta/OG/Twitter (yields to Yoast/Rank Math).

## Planned next
`single-service.php` template · Commercial / About / Service Areas / Brands / Contact page templates · full Service & BreadcrumbList schema · content rewrite from references.

---
Website by [Alexey Kachan Agency](https://alexeykachan.com/).
