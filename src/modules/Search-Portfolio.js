import axios from 'axios'

class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML()
    this.resultsDiv = document.querySelector('#search-results')
    this.searchOverlay = document.querySelector('.search-overlay')
    this.searchField = document.querySelector('#port-search-term')
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
    if (this.searchField.value != this.previousValue) {
      clearTimeout(this.typingTimer)
      if (this.searchField.value) {
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
    this.previousValue = this.searchField.value // get the value of the search field
  }

  async getResults() {
    try {
      const response = await axios.get(
        data.root_url +
          '/wp-json/YOURTHEMEPATH/v1/search?term=' +
          this.searchField.value
      )
      const results = response.data

      this.resultsDiv.innerHTML = `
        <div class="row">
          <div class="col-12">
            <h2>Informações Gerais</h2>
            ${
              results.generalInfo.length
                ? '<ul class="results-list">'
                : '<p>Não há resultados</p>'
            }
              ${results.generalInfo
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
            ${results.generalInfo.length ? '</ul>' : ''}
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
