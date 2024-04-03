const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));

// 監視ファイルと出力先フォルダ
const srcPath = './src/scss/**/*.scss';
const distPath = 'css';

// コンパイル処理
const compileSass = () => {
    return src(srcPath)                            // 監視ファイル
        .pipe(sass({ outputStyle: 'compressed' })  // 出力形式はcompressed
            .on("error", sass.logError)            // sassのコンパイルエラー表示
        )
        .pipe(dest(distPath))                      // 出力先フォルダ
}

// sassの常時監視、変更があったら変換する
const watchSass = () => {
    watch(srcPath, compileSass);
}

// タスクの実行
exports.default = watchSass;
