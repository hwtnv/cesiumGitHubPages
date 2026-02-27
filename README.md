富士山「動物交通事故死」マップ
======================

富士山麓で発生した野生動物の交通事故位置と種類を可視化する、Cesiumベースのデジタルアーカイブです。  
富士山アウトドアミュージアム収集データをもとに制作されています。

## 現在の主な仕様

- Cesium `Viewer` を利用した3D地球儀表示
- CZMLデータの時系列再生
- ビルボードクリック時の独自モーダル表示（ビルボード位置付近に追従）
- ジオコーディング検索
- レイヤ透過スライダー（OSMオーバーレイ）
- Street View連携（Google Maps API利用時）

## 使い方

- 視点移動・GitHubへのリンク: 左上メニューボタン
- ジオコーディング: 左上フォーム
- レイヤ切り替え: 右上パラメータボタン
- ヘルプ: 右上 `?` ボタン

## 依存設定

`index.html` 内で以下を参照しています。

- Cesium Ion Access Token
- Google Maps API Key
- CZML内ビルボード画像（Google Cloud / `lh3.googleusercontent.com`）

注: ビルボード画像は外部URL依存のため、ネットワークや参照先状態によって表示できない場合があります。

## ベース

以下の教材リポジトリをベースに、KMLからCZMLへの変更などを行っています。

- [Cesiumを使ったKML可視化のサンプル](https://github.com/wtnv-lab/cesiumGitHubPages)

## 参考リンク

1. [公式ウェブサイト](http://animal.mapping.jp/)
2. [GitHub Pages](http://hwtnv.github.io/cesiumGitHubPages/)
3. [Cesium](https://cesium.com/)

## ライセンス

本コンテンツは CC BY-NC-SA 4.0 で提供されています。

- [CC BY-NC-SA 4.0](http://creativecommons.org/licenses/by-nc-sa/4.0/)
