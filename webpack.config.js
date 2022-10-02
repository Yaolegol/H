const {CleanWebpackPlugin} = require("clean-webpack-plugin");
const CopyPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");

const getAppDirectoriesData = () => {
    const path_root = path.resolve(__dirname);
    const path_public = path.resolve(path_root, 'public');
    const path_build = path.resolve(path_public, 'build');
    const path_build_images = path.resolve(path_build, 'images');
    const path_resource = path.resolve(path_root, 'resources');
    const path_resource_images = path.resolve(path_resource, 'images');
    const path_views = path.resolve(path_resource, 'views');
    const path_pages = path.resolve(path_views, 'pages');

    return {
        path_build,
        path_build_images,
        path_pages,
        path_public,
        path_resource,
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
            admin_index: path.resolve(appDirectoriesData.path_pages, 'admin', 'index'),
            auth_login_index: path.resolve(appDirectoriesData.path_pages, 'auth', 'login', 'index'),
            auth_register_index: path.resolve(appDirectoriesData.path_pages, 'auth', 'register', 'index'),
            catalog_firstLevel_index: path.resolve(appDirectoriesData.path_pages, 'catalog', 'firstLevel', 'index'),
            catalog_secondLevel_index: path.resolve(appDirectoriesData.path_pages, 'catalog', 'secondLevel', 'index'),
            favorites_index: path.resolve(appDirectoriesData.path_pages, 'favorites', 'index'),
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
                    use: [MiniCssExtractPlugin.loader, "css-loader", "less-loader"],
                },
                // css
                {
                    test: /\.css$/i,
                    use: [MiniCssExtractPlugin.loader, 'css-loader'],
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
