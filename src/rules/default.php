<?php

return [
  '@PSR2' => true,
  'array_syntax' => ['syntax' => 'short'],
  'binary_operator_spaces' => true,
  'blank_line_before_statement' => [
    'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
  ],
  'method_argument_space' => [
    'on_multiline' => 'ensure_fully_multiline',
    'keep_multiple_spaces_after_comma' => true,
  ],
  'no_unused_imports' => true,
  'not_operator_with_successor_space' => true,
  'ordered_imports' => ['sortAlgorithm' => 'alpha'],
  'phpdoc_scalar' => true,
  'phpdoc_single_line_var_spacing' => true,
  'phpdoc_var_without_name' => true,
  'trailing_comma_in_multiline_array' => true,
  'unary_operator_spaces' => true,
];
