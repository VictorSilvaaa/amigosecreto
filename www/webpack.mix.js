
const mix = require("laravel-mix");

mix
    .stylus("resources/stylus/main.styl", "public/assets/css").options({
        processCssUrls: false,
    })
    .sass("resources/css/app.scss", "public/assets/css/bootstrap.css")
    .copy("resources/imgs", "public/assets/imgs")
    .js("resources/js/app.js", "public/assets/js/app.js")

mix.webpackConfig((webpack) => {
    return {
        plugins: [
            new webpack.ProvidePlugin({
                Cookies: "js-cookie",
            }),
        ],
        stats: {
            children: true,
        },
    };
});

mix.disableNotifications();

// Configuração do BrowserSync
mix.browserSync({
    proxy: "http://localhost", // Altere para o seu domínio local
    notify: false, // Desabilita as notificações do BrowserSync
    open: false,
});
