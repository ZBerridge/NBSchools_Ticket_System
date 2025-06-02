const path = require('path')

const { VueLoaderPlugin } = require('vue-loader')

module.exports = {
  mode: 'production',
  entry: './frontend/src/scripts/index.js', // Change on WP Theme to point to frontend folder
  output: {
    path: path.resolve(__dirname, './frontend/dist/scripts'),
  },
  optimization: {
    splitChunks: {
      cacheGroups: {
        vendors: { // Put vendor dependencies in a separate chunk called 'vendors'
          test: /[\\/]node_modules[\\/]/,
          name: 'vendors',
          enforce: true,
          chunks: 'all'
        }
      }
    }
  },
  devtool: 'source-map',
  module: {
    rules: [
        {
            test: /\.js$/,
            exclude: /(node_modules)/,
            loader: 'babel-loader'
        },
        {
            test: /\.vue$/,
            loader: 'vue-loader'
        }
    ]
  },
  plugins: [
    new VueLoaderPlugin()
  ]
}