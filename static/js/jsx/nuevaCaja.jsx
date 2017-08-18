class Caja extends React.Component{
    constructor(props){
        super(props);
        this.onClickProducto = this.onClickProducto.bind(this);
        this.onClickProductoVenta = this.onClickProductoVenta.bind(this);
        this.onClickFacturar = this.onClickFacturar.bind(this);
        this.onClickCredito = this.onClickCredito.bind(this);
        this.onClickBuscarClienteCredito = this.onClickBuscarClienteCredito.bind(this);
        this.onClickCancelarBusquedaClienteCredito = this.onClickCancelarBusquedaClienteCredito.bind(this);
        this.nuevaVenta = this.nuevaVenta.bind(this);
        this.eachProductoVenta = this.eachProductoVenta.bind(this);
        this.state = { 
                        ventaProductos: [], 
                        subTotal: 0.00, 
                        iva: 0.00, 
                        total: 0.00, 
                        btnCreditoText: 'Credito', 
                        btnFacturaText: 'Facturar', 
                        btnEstado: true 
                    };
        
    }
    componentDidMount(){
        $.ajax({
                url: '/configuracion/ivaCaja',
                dataType: 'json',
                cache: false,
                success: function(data){
                    this.setState({ confIva: data[0] });
                }.bind(this)
            });
    }
    onClickProducto(producto, index){
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
    }
    onClickProductoVenta(productoVenta){
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
    }
    onClickFacturar(){
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
    }
    onClickCredito(){
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
    }
    onClickBuscarClienteCredito(){
        this.setState({ btnCreditoText: 'Cargando...' });
        $('#ventanaModal').fadeIn();
    }
    onClickCancelarBusquedaClienteCredito(){
        this.setState({ btnCreditoText: 'Credito' });
        $('#ventanaModal').fadeOut();
    }
    nuevaVenta(){
        this.setState({ ventaProductos: [], subTotal: 0.00, iva: 0.00, total: 0.00 });
    }
    eachProductoVenta(producto, index){
        return(
                <ProductoVenta key={index} index={index} producto={producto} onClickProductoVenta={this.onClickProductoVenta} />
            );
    }
    render(){
        return(
                <div>
                    <div className="col-lg-8 col-sm-8">
                        <div className="card">
                            <div className="header">
                                <h4 className="title">Lista de productos</h4>
                            </div>
                            <div class="content"> 
                                <div className="form-group">                                                                
                                    <input type="text" class="form-control border-input" placeholder="Buscar" name="categoria" />
                                </div>
                                <div class="table-responsive table-full-width">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        );
    }
}