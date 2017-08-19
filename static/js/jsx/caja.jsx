var Producto = React.createClass({
        clickProducto: function(){
                this.props.onClickProducto(this.props.producto, this.props.index);
        },
        render:function(){
                return(
                        <a className="list-group-item list-group-item-action" onClick={this.clickProducto}>
                                {this.props.producto.descripcion}
                                <span className="badge badge-default badge-pill">{this.props.producto.cantidad}</span>
                                <span className="badge badge-default badge-pill">C$ {this.props.producto.precio}</span>                                
                        </a>
                );
        }
});

var Productos = React.createClass({
        getInitialState: function(){
                return { productos: [], productoFiltro: [] };
        },
        componentDidMount: function(){
                $.ajax({
                        url: '/caja/listaProducto',
                        dataType: 'json',
                        cache: false,
                        success: function(data){
                                this.setState({ productos: data, productoFiltro: data });
                        }.bind(this)
                });
        },
        onClickProducto: function(producto, index){
                this.props.onClickProducto(producto, index);
        },
        onChangeFiltro: function(event){
                var productoTemporal = this.state.productoFiltro;
                productoTemporal = productoTemporal.filter(function(item){
                        return item.descripcion.toLowerCase().search(event.target.value.toLowerCase()) != -1
                });
                this.setState({ productos: productoTemporal });
        },
        eachProducto: function(producto, index){
                return(
                        <Producto key={index} index={index} producto={producto} onClickProducto={this.onClickProducto} />
                );
        },
        render:function(){
                return (
                        <div className="panel panel-success">
                                <div className="panel-heading">
                                        <div className="text-left">
                                                <strong>Lista de Productos</strong>            
                                        </div>
                                </div> 
                                <div className="panel-body">
                                        <section className="buscar">
                                                <form>
                                                        <div className="form-group">                                                                
                                                                <input type="text" ref="productoFiltro" className="form-control" id="txtBuscar" placeholder="Buscar" onChange={this.onChangeFiltro}/>
                                                        </div>
                                                </form>
                                        </section>  
                                        <section className="lista" id="lista">
                                                <div className="list-group">
                                                        {
                                                                this.state.productos.map(this.eachProducto)
                                                        }
                                                </div>
                                        </section>
                                </div>
                        </div>                        
                );
        }
});

var ProductoVenta = React.createClass({
        onClickProductoVenta: function(){
                this.props.onClickProductoVenta(this.props.producto);
        },
        render: function(){
                return(                        
                        <a className="list-group-item list-group-item-action" onClick={this.onClickProductoVenta}>
                                {this.props.producto.descripcion}                                        
                                <span className="badge badge-default badge-pill">{this.props.producto.cantidad}</span>
                                <span className="badge badge-default badge-pill">C$ {this.props.producto.monto}</span>
                        </a>
                );
        }
});

var Cliente = React.createClass({
        onClickCliente: function(){
                this.props.onClickCliente(this.props.index);
        },
        render: function(){
                return(
                        <tr onClick={this.onClickCliente}>
                                <td>{this.props.cliente.firstname}</td>
                                <td>{this.props.cliente.lastname}</td>
                                <td>{this.props.cliente.business}</td>                                
                        </tr>
                );
        }
});

var Clientes = React.createClass({
        getInitialState: function(){
                return({ clientes: [], clientesFiltro: [] });
        },
        componentDidMount: function(){
                $.ajax({
                        url: '/caja/listaClientes',
                        dataType: 'json',
                        cache: false,
                        success: function(data){
                                this.setState({ clientes: data, clientesFiltro: data });
                        }.bind(this)
                });
        },
        onClickCliente: function(index){
                this.props.onClickCliente(this.state.clientes[index]);
        },
        eachClientes: function(cliente, index){
                return(
                        <Cliente key={index} index={index} cliente={cliente} onClickCliente={this.onClickCliente} />
                );
        },
        onChangeFiltro: function(){
                var clientesTemporales = [];
                var filtro1 = 0;
                var filtro2 = 0;
                var filtro3 = 0;
                for(var i = 0; i < this.state.clientesFiltro.length; i++){
                        filtro1 = this.state.clientesFiltro[i].firstname.toLowerCase().search(this.refs.nombres.value.toLowerCase());
                        filtro2 = this.state.clientesFiltro[i].lastname.toLowerCase().search(this.refs.apellidos.value.toLowerCase());
                        filtro3 = this.state.clientesFiltro[i].business.toLowerCase().search(this.refs.empresas.value.toLowerCase());
                        if(filtro1 != -1 & filtro2 != -1 & filtro3 != -1){
                                clientesTemporales.push(this.state.clientesFiltro[i]);                                
                        }
                }
                this.setState({ clientes: clientesTemporales });
        },
        render: function(){
                return(
                        <div>
                                <table className="table table-bordered">
                                        <thead className="thead-default">
                                                <tr>  
                                                        <th>Nombres</th>
                                                        <th>Apellidos</th>
                                                        <th>Empresa</th>
                                                </tr>
                                                <tr>  
                                                        <th>
                                                                <input type="text" ref="nombres" className="form-control" placeholder="Filtro por nombre" onChange={this.onChangeFiltro}/>
                                                        </th>
                                                        <th>
                                                                <input type="text" ref="apellidos" className="form-control" placeholder="Filtro por apellidos" onChange={this.onChangeFiltro}/>
                                                        </th>
                                                        <th>
                                                                <input type="text" ref="empresas" className="form-control" placeholder="Filtro por empresa" onChange={this.onChangeFiltro}/>
                                                        </th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                {
                                                        this.state.clientes.map(this.eachClientes)
                                                }
                                        </tbody>
                                </table>
                        </div>
                );
        }
});

var Caja = React.createClass({
        getInitialState: function(){
                return({ ventaProductos: [], subTotal: 0.00, iva: 0.00, total: 0.00, btnCreditoText: 'Credito', btnFacturaText: 'Facturar', btnEstado: true });
        },
        componentDidMount: function(){
                $.ajax({
                        url: '/configuracion/ivaCaja',
                        dataType: 'json',
                        cache: false,
                        success: function(data){
                                this.setState({ confIva: data[0] });
                        }.bind(this)
                });
        },
        onClickProducto: function(producto, index){
                let ventasTemp = this.state.ventaProductos;
                let encontrado = false;
                let total = parseFloat(0.00);
                let montoIva = parseFloat(this.state.confIva.porcentaje/100);
                let totalSubTotal = 0;
                let totalIva = 0; 
                for(var i = 0; i < ventasTemp.length; i++){                        
                        if(ventasTemp[i].ProductID == producto.ProductID){
                                ventasTemp[i].cantidad++;                                
                                ventasTemp[i].monto = parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad);
                                totalSubTotal = totalSubTotal + ventasTemp[i].monto;
                                if(producto.taxFree == "1"){
                                        totalIva = totalIva + (ventasTemp[i].monto * montoIva);
                                        ventasTemp[i].monto = ventasTemp[i].monto + (ventasTemp[i].monto * montoIva);
                                }
                                encontrado = true;                                
                        }else{
                                if(ventasTemp[i].taxFree == "1"){
                                        totalIva = totalIva + (ventasTemp[i].monto * montoIva);
                                }
                                totalSubTotal = totalSubTotal + ventasTemp[i].monto;
                        }
                }
                if(encontrado == false){
                        let calculoMonto = parseFloat(producto.precio)
                        totalSubTotal = totalSubTotal + calculoMonto;
                        if(producto.taxFree == "1"){
                                totalIva = totalIva + (parseFloat(producto.precio) * montoIva);
                                calculoMonto = calculoMonto + (parseFloat(producto.precio) * montoIva);
                        }
                        ventasTemp.push({ 
                                ProductID: producto.ProductID,
                                descripcion: producto.descripcion,
                                precio: producto.precio,
                                cantidad: 1,
                                monto: calculoMonto,
                                taxFree: producto.taxFree
                        });
                }
                total = totalIva + totalSubTotal;
                if(this.state.btnEstado)                             
                        this.setState({ ventaProductos: ventasTemp, subTotal: totalSubTotal, iva: totalIva, total: total, btnEstado: false });
                else
                        this.setState({ ventaProductos: ventasTemp, subTotal:totalSubTotal, iva: totalIva, total: total });
        },
        onClickProductoVenta: function(productoVenta){
                let ventasTemp = this.state.ventaProductos;
                let eliminar = false;
                let indexEliminar;
                let total = parseFloat(0.00);
                let montoIva = parseFloat(this.state.confIva.porcentaje/100);
                let totalSubTotal = 0;
                let totalIva = 0; 
                for(let i = 0; i < ventasTemp.length; i++){
                        if(ventasTemp[i].ProductID == productoVenta.ProductID){
                                if(ventasTemp[i].cantidad > 1){
                                        ventasTemp[i].cantidad--;                                
                                        ventasTemp[i].monto = parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad);
                                        totalSubTotal = totalSubTotal + ventasTemp[i].monto;
                                        if(productoVenta.taxFree == "1"){
                                                totalIva = totalIva + (ventasTemp[i].monto * montoIva);
                                                ventasTemp[i].monto = ventasTemp[i].monto + (ventasTemp[i].monto * montoIva);
                                        }
                                }                   
                                else{
                                        eliminar = true;
                                        indexEliminar = i;
                                }
                        }else{
                                totalSubTotal = totalSubTotal + parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad);
                                if(ventasTemp[i].taxFree == "1"){
                                        totalIva = totalIva + (parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad) * montoIva);                                        
                                }
                        }
                }
                if(eliminar == true){
                        ventasTemp.splice(indexEliminar, 1);
                }
                total = totalIva + totalSubTotal;
                if(ventasTemp.length == 0)
                        this.setState({ ventaProductos: ventasTemp, subTotal: totalSubTotal, iva: totalIva, total: total, btnEstado: true });
                else
                        this.setState({ ventaProductos: ventasTemp, subTotal: totalSubTotal, iva: totalIva, total: total });
        },
        onClickFacturar: function(){
                if(this.state.ventaProductos.length > 0){  
                        this.setState({ btnFacturaText: 'Guardando...', btnEstado: true });
                        var self = this;                                               
                        $.post("/caja/facturar", { nuevaVenta : this.state.ventaProductos })
                        .done(function(data){
                                if(data != 0){
                                        self.nuevaVenta();
                                        self.setState({ btnFacturaText: 'Facturar', btnEstado: false });
                                }
                        })
                        .fail(function(data) {
                                console.log('error del server');
                                console.log(data);
                                self.setState({ btnFacturaText: 'Facturar', btnEstado: false });
                        });
                }
        },
        onClickCredito: function(clie){
                if(this.state.ventaProductos.length > 0){ 
                        this.setState({ btnCreditoText: 'Guardando...', btnEstado: true }); 
                        $('#ventanaModal').fadeOut();                      
                        var self = this;                                               
                        $.post("/caja/facturarCredito", { nuevaVenta : this.state.ventaProductos, cliente: clie })
                        .done(function(data){
                                if(data != 0){
                                        //$('.close').trigger('click');
                                        self.nuevaVenta();
                                        self.setState({ btnCreditoText: 'Credito', btnEstado: false });
                                }
                        })
                        .fail(function(data) {
                                console.log('error del server');
                                self.setState({ btnCreditoText: 'Credito', btnEstado: false });
                        });
                }                
        },
        onClickBuscarClienteCredito: function(){
                this.setState({ btnCreditoText: 'Cargando...' });
                $('#ventanaModal').fadeIn();
        },
        onClickCancelarBusquedaClienteCredito: function(){
                this.setState({ btnCreditoText: 'Credito' });
                $('#ventanaModal').fadeOut();
        },
        nuevaVenta: function(){
                this.setState({ ventaProductos: [], subTotal: 0.00, iva: 0.00, total: 0.00 });
        },
        eachProductoVenta: function(producto, index){
                return(
                        <ProductoVenta key={index} index={index} producto={producto} onClickProductoVenta={this.onClickProductoVenta} />
                );
        },
        render: function(){
                return(
                        <div>
                                <div className="col-lg-8">
                                        <Productos onClickProducto={this.onClickProducto}/>
                                </div>
                                <div className="col-lg-4">
                                        <div className="panel panel-success">
                                                <div className="panel-heading">
                                                        <div className="heading-total">                                                                                                                           
                                                                <button type="button" className="btn btn-primary btn-sm btn-caja" disabled={this.state.btnEstado} onClick={this.onClickFacturar} >{ this.state.btnFacturaText }</button>    
                                                                <button type="button" className="btn btn-primary pull-right btn-sm btn-caja" disabled={this.state.btnEstado} onClick={this.onClickBuscarClienteCredito}>{ this.state.btnCreditoText } </button>                                
                                                        </div>                                                       
                                                </div>
                                                <div className="panel-body">
                                                        <section className="resumen">
                                                                <div className="list-group">
                                                                        {
                                                                                this.state.ventaProductos.map(this.eachProductoVenta)
                                                                        }
                                                                </div>
                                                        </section>
                                                </div>
                                                <div className="panel-footer">
                                                        <div class="row">
                                                                <lable><strong>SubTotal : <span className="pull-right">C$ {this.state.subTotal}</span></strong></lable>
                                                        </div>
                                                        <div class="row">
                                                                <lable><strong>Iva : <span className="pull-right">C$ {this.state.iva}</span></strong></lable>
                                                        </div>
                                                        <div class="row">
                                                                <lable><strong>Total : <span className="pull-right">C$ {this.state.total}</span></strong></lable>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div className="ventanaModal" id="ventanaModal">                                        
                                        <div className="ventanaModal-content">
                                                <div className="ventanaModal-header"> 
                                                        <button type="button" className="close" onClick={this.onClickCancelarBusquedaClienteCredito}>
                                                                <span aria-hidden="true">×</span>
                                                        </button> 
                                                        <h4 className="ventanaModal-title">Lista de Clientes</h4> 
                                                </div>
                                                <div className="ventanaModal-body">
                                                        <Clientes onClickCliente={this.onClickCredito} />
                                                </div>
                                        </div>                                        
                                </div>
                        </div>
                );
        }
});

ReactDOM.render(
        <Caja />,
        document.getElementById('caja')
);