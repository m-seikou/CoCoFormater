<?php

class Writer
{
    public static function header(): string
    {
        return <<<EOL
        <!DOCTYPE html>
        <html lang="ja">
          <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>ccfolia - logs</title>
          </head>

        EOL;
    }

    public static function bodyHead(): string
    {
        return <<<EOL
          <body>
            <style>
              th {
                border: 2px;
              }
              td {
                border: 1px;
              }
              span{
                display: block;
              }
            </style>
            <table>

        EOL;
    }

    public static function bodyTail(): string
    {
        return <<<EOL
            </table>
          </body>
        </html>

        EOL;
    }

    public static function tableHeader(CoCoForliaLog $log): string
    {
        $result = <<<EOL
              <thead>
                <tr>
        
        EOL;
        foreach ($log->getTabs() as $tab) {
            $result .= <<<EOL
                      <th>$tab</th>

            EOL;
        }
        $result .= <<<EOL
                </tr>
              </thead>
        
        EOL;
        return $result;
    }

    public static function tableBody(CoCoForliaLog $log): string
    {
        $result = <<<EOL
              <tbody>
        
        EOL;
        foreach ($log->getPosts() as $post) {
            $result .= <<<EOL
                    <tr>

            EOL;
            $color = htmlspecialchars($post->color);
            $name = htmlspecialchars($post->name);
            $content = str_replace("\n", '<br />', htmlspecialchars($post->content));
            foreach ($log->getTabs() as $tab) {
                if ($tab != $post->tab) {
                    $result .= <<<EOL
                              <td></td>

                    EOL;

                } else {
                    $result .= <<<EOL
                              <td>
                                <span style="color:$color">$name</span>
                                <span>$content</span>
                              </td>

                    EOL;

                }
            }
            $result .= <<<EOL
                    </tr>

            EOL;
        }
        $result .= <<<EOL
              </tbody>
        
        EOL;
        return $result;

    }

    public static function post(Post $post): string
    {
        return '<span style="color:"' . $post->color . '>' . $post->name . '</span>
<span>' . str_replace("\n", '<br />', $post->content) . '</span>';
    }

}
