import axios from 'axios'

class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML()
    this.resultsDiv = document.querySelector('#search-results')
    this.searchOverlay = document.querySelector('.search-overlay')
    this.searchData = document.querySelector('#data')
    this.SearchEquipe = document.querySelector('#equipe')
    this.SearchProjeto = document.querySelector('#projeto')
    this.searchField = {
      equipe: this.SearchEquipe,
      projeto: this.SearchProjeto,
      data: this.searchData
    }

    this.events()
    this.isOverlayOpen = false
    this.isSpinnerVisible = false
    this.previousValue
    this.typingTimer
  }

  // 2. events
  events() {
    this.searchField.addEventListener('keyup', () => this.typingLogic())
  }

  // 3. methods (function, action...)
  typingLogic() {
    if (this.searchField.projeto.value != this.previousValue) {
      clearTimeout(this.typingTimer)
      if (this.searchField.projeto.value) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = `
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Carregando...</span>
              </div>
            </div>
            `
          this.isSpinnerVisible = true
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750)
      } else {
        this.resultsDiv.innerHTML = `
        <h2></h2>
        `
        this.isSpinnerVisible = false
      }
    }
    this.previousValue = this.searchField.projeto.value // get the value of the search field
  }

  async getResults() {
    try {
      const response = await axios.get(
        data.root_url +
          '/wp-json/caixola/v1/search?term=' +
          this.searchField.value
      )
      const results = response.data

      this.resultsDiv.innerHTML = `
        <div class="row">
          <div class="col-12">
            <h2>Resultados obtidos</h2>
            ${
              results.portfolio.length
                ? '<ul class="results-list">'
                : '<p>Não há resultados</p>'
            }
              ${results.portfolio
                .map(
                  item =>
                    `<li>
                      <a href="${item.permalink}">
                        ${item.title}
                      </a>  
                      ${
                        item.postType == 'criado'
                          ? `por ${item.authorName}`
                          : ''
                      }
                    </li>`
                )
                .join('')}
            ${results.portfolio.length ? '</ul>' : ''}
          </div>
        </div>
      `
      this.isSpinnerVisible = false
    } catch (e) {
      console.log(e)
    }
  }
}

export default Search
