// https://eslint.org/docs/user-guide/configuring

module.exports = {
  root: true,
  parser: 'babel-eslint',
  parserOptions: {
    sourceType: 'module'
  },
  env: {
    browser: true,
  },
  // https://github.com/standard/standard/blob/master/docs/RULES-en.md
  extends: 'standard',
  // required to lint *.vue files
  plugins: [
    'html'
  ],
  // add your custom rules here
  'rules': {
    // disable camelcase require - REST API objects include underscores
    'camelcase': 0,
    // forces spaces inside parentheses
    'space-in-parens': ['error', 'always'],
    // forces yoda conditional statements
    // 'yoda': ['error', 'always'],
    // disable yoda errors
    'yoda': 0,
    // require semicolons
    // 'semi': ['error', 'always'],
    // disable semicolon errors
    'semi': 0,
    // disable no-tabs rule
    'no-tabs': 0,
    // allow paren-less arrow functions
    'arrow-parens': 0,
    // allow trailing commas
    'comma-dangle': 0,
    // allow async-await
    'generator-star-spacing': 0,
    // Force tab indentation
    // 'indent': ['error', 'tab'],
    // disable indentation errors
    'indent': 0,
    // don't require spaces before function names, except for when using async
    // 'space-before-function-paren': ['error', {
    //   'anonymous': 'never',
    //   'named': 'never',
    //   'asyncArrow': 'always'
    // }],
    // disable paren space errors
    'space-before-function-paren': 0,
    // allow for space after unary operators
    'space-unary-ops': 0,
    // allow debugger during development
    'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0,
  }
}
