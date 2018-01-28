# KF01-02-Blog
## A blog posts project

![index](../assets/a.png?raw=true)
![show](../assets/b.png?raw=true)
![category](../assets/c.png?raw=true)
![dashboard](../assets/d.png?raw=true)

### Uses
- [**Summernote**](https://summernote.org) wysiwyg editor
- [**AddThis**](https://www.addthis.com) for sharing posts in social media
- [**spatie/laravel-newsletter**](https://github.com/spatie/laravel-newsletter) and [**MailChimp**](https://mailchimp.com) for email subscription
- [**Disqus**](https://disqus.com) for managing comments

### Functionalities
(coming soon)

### To run this app
- Run `composer install`
- Create MySQL database
- Create `.env` file
  - Update `APP_KEY` with `php artisan key:generate`
  - Update database connection info
- Run `php artisan migrate`
- Seed the database
  - On Mac, `default.jpg` and `default-post.png` should have '777' permissions and be owned by `daemon:staff`
  - On Windows 10, this is not necessary
  - Run `php artisan db:seed`
- Run `php artisan storage:link`
- Set up Apache web server