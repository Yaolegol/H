const {CleanWebpackPlugin} = require("clean-webpack-plugin");
const CopyPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");

module.exports = {
    entry: {
        index: "./resources/views/pages",
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
                defaultVendors: {
                    name: 'vendor',
                    reuseExistingChunk: true,
                    test: /[\\/]node_modules[\\/]/,
                },
            },
            chunks: 'all',
        },
    },
    output: {
        filename: "[name].bundle.js",
        path: path.resolve(__dirname, "public", "build"),
    },
    plugins: [
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin(),
        new CopyPlugin({
            patterns: [
                {
                    from: path.resolve(__dirname, "resources", "images"),
                    to: path.resolve(__dirname, "public", "build", "images")
                },
            ],
        }),
    ],
    resolve: {
        modules: [
            path.resolve(__dirname, "resources"),
            "node_modules"
        ],
    },
    watch: true,
};
