<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Laravel Marvel Api
<img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/Saul-Lara/Laravel-Marvel-Api?style=flat-square"> <img alt="GitHub" src="https://img.shields.io/github/license/Saul-Lara/Laravel-Marvel-Api?style=flat-square"> <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/Saul-Lara/Laravel-Marvel-Api?color=green&style=flat-square">

A simple project displaying data of comics, characters and series.  
This pages was built to practice Laravel Framework and Livewire.  
Especially to understand how to work with an external api with json, in this case with Marvel API.

## :rocket: Built With

```
📄 Laravel
📝 Tailwind CSS
📑 Livewire
📄 Alpine.js
```

##  :wrench: Setup

1. Clone this :open_file_folder: repository.
2. `cd` into it.
3. Install Composer Dependencies.  
`composer install`
4. Install NPM Dependencies.  
`npm install`
5. Rename or copy `.env.example` file to `.env`
6. Set your `MARVEL_API_PUBLIC_KEY` and `MARVEL_API_PRIVATE_KEY` in your `.env` file.  
In order to use the Laravel app, you need to obtain an :key: [***Marvel API key***](https://developer.marvel.com/account).
7. Generate an app encryption key.  
`php artisan key:generate`
8. `php artisan serve`
9. Visit `localhost:8000` in your browser.

## :computer: How to use?

### Routes

* `/` - *List of the first 10 comics of the month.*
* `/comics/{id}` - *View comic details by id.*
* `/characters` - *List of characters.*
* `/characters/page/{page}` - *List of characters by page.*
* `/characters/{id}` - *View character details by id.*
* `/series` - *List of series.*
* `/series/page/{page}` - *List of series by page.*
* `/series/{id}` - *View series details by id.*

#### Comics

![comicsView](https://raw.githubusercontent.com/Saul-Lara/Laravel-Marvel-Api/master/readmeAssets/comicsView.JPG)

#### Comic details

![comicDetails](https://raw.githubusercontent.com/Saul-Lara/Laravel-Marvel-Api/master/readmeAssets/comicDetails.gif)

#### Infinite scroll
It's used in the routes `/characters` and `/series`.

![infiniteScroll](https://raw.githubusercontent.com/Saul-Lara/Laravel-Marvel-Api/master/readmeAssets/infiniteScroll.gif)

#### Character details

![characterDetails](https://raw.githubusercontent.com/Saul-Lara/Laravel-Marvel-Api/master/readmeAssets/characterDetail.JPG)

#### Serie details

![serieDetails](https://raw.githubusercontent.com/Saul-Lara/Laravel-Marvel-Api/master/readmeAssets/serieDetail.JPG)

#### Search comics
It's used in all routes.  
You need press `Shift + 7` or `/` to focus the search input.

![searchComics](https://raw.githubusercontent.com/Saul-Lara/Laravel-Marvel-Api/master/readmeAssets/searchComic.gif)

##  :scroll: Legal

Data provided by ©Marvel.

Images and content were taken from the following resource:
* [Marvel Developer Portal](https://developer.marvel.com/)

This site was built entirely for education purposes only.

## :green_book: License

Code in this repository is open-sourced software licensed under the [GPL-3.0 license](https://opensource.org/licenses/GPL-3.0).  
See the [LICENSE.md](https://github.com/Saul-Lara/Laravel-Marvel-Api/blob/master/LICENSE) file for details.

ammarpvl29

---