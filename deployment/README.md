# clickvera.in live folder setup

Assumed Laravel project folder: `public_html/clickvera` (spelled clickvera).

Preferred setup: set the domain document root to `public_html/clickvera/public`.
The project's existing `public/index.php` already uses the correct relative paths.
When using this document root, keep the existing `public/.htaccess`; do not upload
the fallback file supplied here.

If hosting fixes the document root at `public_html`, back up its existing
`.htaccess`, then upload `deployment/public_html/.htaccess` as
`public_html/.htaccess`. This fallback requires Apache 2.4 with mod_rewrite and
AllowOverride enabled. It routes requests directly to `clickvera/public`, serves
public assets, and prevents direct access to the private project folder.
Merge any hosting-managed rules from the backup when needed.

Keep the production environment file at `public_html/clickvera/.env`, with
`APP_URL=https://clickvera.in` and `APP_DEBUG=false`.

After uploading, run `php artisan optimize:clear` from `public_html/clickvera`
using the hosting terminal, then check the homepage, a nested route, and assets.
Requests to `/.env` and `/clickvera/.env` should return 403.

These files are prepared locally; hosting settings and live requests have not
been changed or verified.
