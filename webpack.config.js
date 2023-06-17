const {CleanWebpackPlugin} = require("clean-webpack-plugin");
const CopyPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");

const getAppDirectoriesData = () => {
    const path_root = path.resolve(__dirname);
    const path_public = path.resolve(path_root, 'public');
    const path_build = path.resolve(path_public, 'build');
    const path_build_fonts = path.resolve(path_build, 'fonts');
    const path_build_icons = path.resolve(path_build, 'icons');
    const path_build_images = path.resolve(path_build, 'images');
    const path_resource = path.resolve(path_root, 'resources');
    const path_resource_fonts = path.resolve(path_resource, 'fonts');
    const path_resource_icons = path.resolve(path_resource, 'icons');
    const path_resource_images = path.resolve(path_resource, 'images');
    const path_views = path.resolve(path_resource, 'views');
    const path_pages = path.resolve(path_views, 'pages');

    return {
        path_build,
        path_build_fonts,
        path_build_icons,
        path_build_images,
        path_pages,
        path_public,
        path_resource,
        path_resource_fonts,
        path_resource_icons,
        path_resource_images,
        path_root,
        path_views,
    }
}

const appDirectoriesData = getAppDirectoriesData();

const createConfig = (env, argv) => {
    const {mode} = argv;

    const production = mode === 'production';

    return {
        devtool: production ? false : 'source-map',
        entry: {
            about_index: path.resolve(appDirectoriesData.path_pages, 'about', 'index'),
            admin_offers: path.resolve(appDirectoriesData.path_pages, 'admin', 'offers'),
            admin_offersRating: path.resolve(appDirectoriesData.path_pages, 'admin', 'offersRating'),
            admin_organizations: path.resolve(appDirectoriesData.path_pages, 'admin', 'organizations'),
            admin_salePoints: path.resolve(appDirectoriesData.path_pages, 'admin', 'salePoints'),
            admin_users: path.resolve(appDirectoriesData.path_pages, 'admin', 'users'),
            auth_forgotPassword_index: path.resolve(appDirectoriesData.path_pages, 'auth', 'forgotPassword', 'index'),
            auth_login_index: path.resolve(appDirectoriesData.path_pages, 'auth', 'login', 'index'),
            auth_register_index: path.resolve(appDirectoriesData.path_pages, 'auth', 'register', 'index'),
            catalog_firstLevel_index: path.resolve(appDirectoriesData.path_pages, 'catalog', 'firstLevel', 'index'),
            catalog_secondLevel_index: path.resolve(appDirectoriesData.path_pages, 'catalog', 'secondLevel', 'index'),
            copyright_images: path.resolve(appDirectoriesData.path_pages, 'copyright', 'images', 'index'),
            favorites_index: path.resolve(appDirectoriesData.path_pages, 'favorites', 'index'),
            legal_cookie: path.resolve(appDirectoriesData.path_pages, 'legal', 'cookie', 'index'),
            legal_privacyPolicy: path.resolve(appDirectoriesData.path_pages, 'legal', 'privacyPolicy', 'index'),
            legal_termsOfUse: path.resolve(appDirectoriesData.path_pages, 'legal', 'termsOfUse', 'index'),
            map_web_index: path.resolve(appDirectoriesData.path_pages, 'map', 'web', 'index'),
            map_mobileApp_singlePoint_index: path.resolve(appDirectoriesData.path_pages, 'map', 'mobileApp', 'singlePoint', 'index'),
            offers_index: path.resolve(appDirectoriesData.path_pages, 'offers', 'index'),
            offers_show: path.resolve(appDirectoriesData.path_pages, 'offers', 'show'),
            profile_organizationInfo_create: path.resolve(appDirectoriesData.path_pages, 'profile', 'organization-info', 'create'),
            profile_organizationInfo_edit: path.resolve(appDirectoriesData.path_pages, 'profile', 'organization-info', 'edit'),
            profile_organizationInfo_index: path.resolve(appDirectoriesData.path_pages, 'profile', 'organization-info', 'index'),
            profile_personalInfo_index: path.resolve(appDirectoriesData.path_pages, 'profile', 'personal-info', 'index'),
            profile_saleOffers_create: path.resolve(appDirectoriesData.path_pages, 'profile', 'sale-offers', 'create'),
            profile_saleOffers_edit: path.resolve(appDirectoriesData.path_pages, 'profile', 'sale-offers', 'edit'),
            profile_saleOffers_index: path.resolve(appDirectoriesData.path_pages, 'profile', 'sale-offers', 'index'),
            profile_salePointsInfo_create: path.resolve(appDirectoriesData.path_pages, 'profile', 'sale-points-info', 'create'),
            profile_salePointsInfo_edit: path.resolve(appDirectoriesData.path_pages, 'profile', 'sale-points-info', 'edit'),
            profile_salePointsInfo_index: path.resolve(appDirectoriesData.path_pages, 'profile', 'sale-points-info', 'index'),
            sellers_show: path.resolve(appDirectoriesData.path_pages, 'sellers', 'show'),
        },
        module: {
            rules: [
                // babel
                {
                    test: /\.m?js$/i,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: "babel-loader",
                        options: {
                            plugins: [
                                "@babel/plugin-proposal-class-properties",
                                [
                                    "@babel/plugin-transform-runtime",
                                    {
                                        "regenerator": true,
                                    }
                                ]
                            ],
                            presets: ["@babel/preset-env"]
                        },
                    },
                },
                // images
                {
                    test: /\.(png|jpe?g|gif)$/i,
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                name: '[name].[ext]',
                                outputPath: 'images',
                            }
                        },
                    ],
                },
                // fonts
                {
                    test: /\.(woff|woff2|eot|ttf|otf)$/i,
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                name: '[name].[ext]',
                                outputPath: 'fonts',
                            }
                        }
                    ],
                },
                // less
                {
                    test: /\.less$/i,
                    use: [
                        MiniCssExtractPlugin.loader,
                        {
                            loader: 'css-loader',
                            options: {
                                url: false,
                            }
                        },
                        "less-loader"
                    ],
                },
                // css
                {
                    test: /\.css$/i,
                    use: [
                        MiniCssExtractPlugin.loader,
                        {
                            loader: 'css-loader',
                            options: {
                                url: false,
                            }
                        }
                    ],
                },
                // html
                {
                    test: /\.html$/i,
                    loader: "html-loader",
                },
            ],
        },
        optimization: {
            splitChunks: {
                cacheGroups: {
                    commons: {
                        test: /[\\/]node_modules[\\/]/,
                        name: 'vendors',
                        chunks: 'all'
                    }
                }
            },
        },
        output: {
            filename: "[name].[hash].bundle.js",
            path: appDirectoriesData.path_build,
        },
        plugins: [
            new CleanWebpackPlugin(),
            new MiniCssExtractPlugin({
                chunkFilename: "[name].[hash].css",
                filename: "[name].[hash].css",
            }),
            new CopyPlugin({
                patterns: [
                    {
                        from: appDirectoriesData.path_resource_images,
                        to: appDirectoriesData.path_build_images,
                    },
                    {
                        from: appDirectoriesData.path_resource_icons,
                        to: appDirectoriesData.path_build_icons,
                    },
                    {
                        from: appDirectoriesData.path_resource_fonts,
                        to: appDirectoriesData.path_build_fonts,
                    },
                ],
            }),
        ],
        resolve: {
            modules: [
                appDirectoriesData.path_resource,
                "node_modules"
            ],
        },
        watch: !production,
    };
}



module.exports = createConfig;
