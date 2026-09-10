# clickvera.in live folder setup

Confirmed hosting layout: the Laravel project is directly in `public_html`.
The folders `app`, `bootstrap`, `config`, `public`, and `routes` are siblings.
The front controller is `public_html/public/index.php`.

Back up the hosting `public_html/.htaccess`, then replace it with
`deployment/public_html/.htaccess`. Do not put this file inside `public/`.
Preserve hosting-managed PHP handler directives from the backup, if present.
The fallback routes the homepage and application routes to `public/index.php`
and serves assets only from `public/`. Internal rewrites use `[END]` to avoid
re-entering the rules. It requires Apache 2.4-compatible rewrite support.

Alternatively, set the domain document root to `public_html/public` and use
that folder's existing `public/.htaccess`, without this fallback.

Keep the production `.env` at `public_html/.env`, with
`APP_URL=https://www.clickvera.in` and `APP_DEBUG=false`. Preserve the existing
APP_KEY and production database credentials.

After uploading, check the homepage, a nested route, and a public asset.
Requests to `/.env`, `/vendor/autoload.php`, and `/storage/logs/laravel.log`
must not expose private files. The fallback never serves root storage files;
public uploads should use the `public/storage` link.

If HTTP 500 remains, inspect the hosting error log and
`public_html/storage/logs/laravel.log` immediately after reproducing it.
Confirm website PHP is 8.2 or newer, `vendor/autoload.php` exists, the database
settings are correct, and `storage` and `bootstrap/cache` are writable by PHP.
After correcting configuration, run `php artisan optimize:clear` from
`public_html` using the hosting terminal. Review pending migrations before
applying them. Do not regenerate an existing APP_KEY.

If the hosting log rejects the Options directive, remove the Options line
and disable directory listing in the hosting panel.

These changes are prepared locally. Upload and live verification are pending.
