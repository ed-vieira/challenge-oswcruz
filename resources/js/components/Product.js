
import React, { Component } from 'react'
import { formatCurrency } from '../formatter'
import style from './style'



class Product extends Component {

    constructor() {
        super()
        this.state = {
            produtosQt: 1,
            message: '',
            productSelected: '',
        }
        this.addToCart = this.addToCart.bind(this)

    }




    addToCart(){
        let produto = this.props.produto
        const data = {
           produto_id: produto.id,
           user_id : user.id,
           unid: this.state.produtosQt,
           valor_unitario: produto.valor_unitario
        }
        console.log(JSON.stringify(data, null, 4))
        window.axios.post('/api/carrinhos', data)
          .then(res => {
              let productSelected= 'produto adicionado ao carrinho';
              this.setState({productSelected});
           }).catch(err =>{
             console.log( JSON.stringify(err, null, 4) )
          })
    }






    render() {
        const produtosQt = this.state.produtosQt
        const produto = this.props.produto
        const counter = (size) => {
            let options = []
            for (let i = 1; i < (size + 1); i++) {
                options.push(<option key={i}>{i}</option>)
            }
            return options
        }

        return (
            <div  className='col-md-3'  style={style.cardBox}>
                <div className='card'>
                    <div className='card-header'>{produto.nome}</div>
                    <div className='card-body'>
                        <img style={style.image} src={`/images/${produto.avatar}`} />
                        <p style={style.paragraph}><strong>apresentação:</strong> {produto.apresentacao}
                           <br /><strong>laboratorio:</strong> {produto.laboratorio}
                           <br /><strong>principio ativo:</strong> {produto.principio_ativo}
                           <br /><strong>estoque inicial:</strong> {produto.estoque_inicial}
                           <br /><strong>valor unitário:</strong> {formatCurrency(produto.valor_unitario)}
                        </p>
                    </div>
                    <div className="card-footer">
                        <div className="row" style={{padding: 10}}>

                            <div className="col-md-10 offset-md-1">{(this.state.produtosQt > 0) ? `unid.: ${produtosQt}` : ""} </div>
                            <div className="col-md-10 offset-md-1">{(this.state.produtosQt > 0) ? `valor: ${formatCurrency(produtosQt * produto.valor_unitario)}` : ""}</div>

                        </div>
                        <div className="row">
                            <div className="col-md-7">
                                <select onChange={(e) => this.setState({ produtosQt: e.target.value })} className="form-control form-control-sm">
                                    {counter(produto.estoque_inicial)}
                                </select>
                            </div>
                            <div className="col-md-3">
                                <button onClick={this.addToCart} className="btn btn-outline-primary btn-sm">adicionar</button>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-12" style={{padding: '5%'}}>
                                {(this.state.productSelected !== '') ? <p className="btn btn-outline-primary btn-sm">{this.state.productSelected}</p> : ''}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}



export default Product
