class Venta extends React.Component{
    render(){
        return(
            <tr>
                <td>{this.props.venta.cliente}</td>
                <td>C$ {this.props.venta.subtotal}</td>
                <td>C$ {this.props.venta.iva}</td>
                <td>C$ {this.props.venta.total}</td>
                <td>{this.props.venta.cancelada}</td>
            </tr>
        );
    }
}

 class Ventas extends React.Component{
     constructor(props){
        super(props);
        this.onClickBuscar =this.onClickBuscar.bind(this);
        this.state = { ventas: [], estadoBotonDescarga: true };
     }
     onClickBuscar(e){  
        let self = this;       
        $.post("/reportes/getVenta", { fechaInicio : this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value })
        .done(function(data){
            if(JSON.parse(data).length > 0)
                self.setState({ ventas: JSON.parse(data), estadoBotonDescarga: false});
            else
                self.setState({ ventas: JSON.parse(data), estadoBotonDescarga: true});
        })
        .fail(function(data) {
            console.log('error del server');
        });
     }
     render(){
         return(
            <div>
                <div className="row">
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaInicio">Fecha Inicio</label>
                        <input type="text" ref="fechaInicio" readOnly="readonly" className="form-control form_datetime" id="FechaInicio" placeholder="Seleccionar fecha de inicio" />
                    </div> 
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaFin">Fecha Fin</label>
                        <input type="text" ref="fechaFin" readOnly="readonly" className="form-control form_datetime" id="FechaFin" placeholder="Seleccionar fecha fin" />
                    </div>                        
                </div>
                <div className="row">
                    <div className="center">
                        <button onClick={this.onClickBuscar} type="submit" className="btn btn-primary">Buscar</button>
                        <a href={"/reportes/dVenta"} onClick={this.onClickDescarga} disabled={this.state.estadoBotonDescarga} type="button" className="btn btn-primary pull-right">Descargar</a>
                    </div>
                </div>
                <div className="row margen-tabla">
                    <div className="table-responsive">
        	            <table className="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>SubTotal</th>
                                    <th>Iva</th>
                                    <th>Total</th>
                                    <th>Cancelada</th>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    this.state.ventas.map(item => 
                                        <Venta venta={item} />
                                    )
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         );
     }
 }

 class Producto extends React.Component{
     render(){
         return(
             <tr>
                <td>{this.props.producto.descripcion}</td>
                <td>{this.props.producto.cantidad}</td>
                <td>C$ {this.props.producto.monto}</td>
             </tr>
         );
     }
 }

 class Productos extends React.Component{
     constructor(props){
         super(props);
         this.onClickBuscar =this.onClickBuscar.bind(this);
         this.state = { productos: [], estadoBotonDescarga: true };
     }

    onClickBuscar(e){
        let self = this;       
        $.post("/reportes/getVentaProductos", { fechaInicio : this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value })
        .done(function(data){
            if(JSON.parse(data).length > 0)
                self.setState({ productos: JSON.parse(data), estadoBotonDescarga: false});
            else
                self.setState({ productos: JSON.parse(data), estadoBotonDescarga: true});
        })
        .fail(function(data) {
            console.log('error del server');
        });
    }
    render(){
         return(
             <div>
                <div className="row">
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaInicio">Fecha Inicio</label>
                        <input type="text" ref="fechaInicio" readOnly="readonly" className="form-control form_datetime" id="FechaInicio" placeholder="Seleccionar fecha de inicio" />
                    </div> 
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaFin">Fecha Fin</label>
                        <input type="text" ref="fechaFin" readOnly="readonly" className="form-control form_datetime" id="FechaFin" placeholder="Seleccionar fecha fin" />
                    </div>                        
                </div>
                <div className="row">
                    <div className="center">
                        <button onClick={this.onClickBuscar} type="submit" className="btn btn-primary">Buscar</button>
                    </div>
                    <a href={"/reportes/dVentaProductos"} onClick={this.onClickDescarga} disabled={this.state.estadoBotonDescarga} type="button" className="btn btn-primary pull-right">Descargar</a>
                </div>
                <div className="row margen-tabla">
                    <div className="table-responsive">        	            
                        <table className="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Monto</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    this.state.productos.map(item => 
                                        <Producto producto={item} />
                                    )
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         );
     }
 }

 class Usuario extends React.Component{
     render(){
         return(
             <tr>
                <td>{this.props.producto.usuario}</td>
                <td>{this.props.producto.cantidad}</td>
                <td>C$ {this.props.producto.monto}</td>
             </tr>
         );
     }
 }
  class Usuarios extends React.Component{
     constructor(props){
         super(props);
         this.onClickBuscar = this.onClickBuscar.bind(this);
         this.state = { usuarios: [], estadoBotonDescarga: true };
     }

    onClickBuscar(e){
        let self = this;       
        $.post("/reportes/getVentaUsuarios", { fechaInicio : this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value })
        .done(function(data) {
            if(JSON.parse(data).length > 0)
                self.setState({ usuarios: JSON.parse(data), estadoBotonDescarga: false});
            else
                self.setState({ usuarios: JSON.parse(data), estadoBotonDescarga: true});
        })
        .fail(function(data) {
            console.log('error del server');
        });
    }    
    render(){
         return(
             <div>
                <div className="row">
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaInicio">Fecha Inicio</label>
                        <input type="text" ref="fechaInicio" readOnly="readonly" className="form-control form_datetime" id="FechaInicio" placeholder="Seleccionar fecha de inicio" />
                    </div> 
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaFin">Fecha Fin</label>
                        <input type="text" ref="fechaFin" readOnly="readonly" className="form-control form_datetime" id="FechaFin" placeholder="Seleccionar fecha fin" />
                    </div>                        
                </div>
                <div className="row">
                    <div className="center">
                        <button onClick={this.onClickBuscar} type="submit" className="btn btn-primary">Buscar</button>
                    </div>
                    <a href={"/reportes/dVentaUsuarios"} disabled={this.state.estadoBotonDescarga} type="button" className="btn btn-primary pull-right">Descargar</a>
                </div>
                <div className="row margen-tabla">
                    <div className="table-responsive">
        	            <table className="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Usuarios</th>
                                    <th>Cantidad de venta</th>
                                    <th>Monto de ventas</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    this.state.usuarios.map(item => 
                                        <Usuario producto={item} />
                                    )
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         );
     }
 }

 class Cliente extends React.Component{
     render(){
         return(
             <tr>
                <td>{this.props.cliente.cliente}</td>
                <td>C$ {this.props.cliente.subtotal}</td>
                <td>C$ {this.props.cliente.iva}</td>
                <td>C$ {this.props.cliente.total}</td>
             </tr>
         );
     }
 }

 class Clientes extends React.Component{
     constructor(props){
         super(props);
         this.onClickBuscar =this.onClickBuscar.bind(this);
         this.state = { clientes: [], estadoBotonDescarga: true };
     }

    onClickBuscar(e){
        let self = this;       
        $.post("/reportes/getVentaClientes", { fechaInicio : this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value })
        .done(function(data) {
            if(JSON.parse(data).length > 0)
                self.setState({ clientes: JSON.parse(data), estadoBotonDescarga: false});
            else
                self.setState({ clientes: JSON.parse(data), estadoBotonDescarga: true});
        })
        .fail(function(data) {
            console.log('error del server');
        });
    }    
    render(){
         return(
             <div>
                <div className="row">
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaInicio">Fecha Inicio</label>
                        <input type="text" ref="fechaInicio" readOnly="readonly" className="form-control form_datetime" id="FechaInicio" placeholder="Seleccionar fecha de inicio" />
                    </div> 
                     <div className="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="FechaFin">Fecha Fin</label>
                        <input type="text" ref="fechaFin" readOnly="readonly" className="form-control form_datetime" id="FechaFin" placeholder="Seleccionar fecha fin" />
                    </div>                        
                </div>
                <div className="row">
                    <div className="center">
                        <button onClick={this.onClickBuscar} type="submit" className="btn btn-primary">Buscar</button>
                    </div>
                    <a href={"/reportes/dVentaClientes"} disabled={this.state.estadoBotonDescarga} type="button" className="btn btn-primary pull-right">Descargar</a>
                </div>
                <div className="row margen-tabla">
                    <div className="table-responsive">
        	            <table className="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Clientes</th>
                                    <th>SubTotal</th>
                                    <th>Iva</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    this.state.clientes.map(item => 
                                        <Cliente cliente={item} />
                                    )
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         );
     }
 }

 ReactDOM.render(
        <Ventas />,
        document.getElementById('content-venta')
);
 ReactDOM.render(
        <Productos />,
        document.getElementById('content-productos')
);
 ReactDOM.render(
        <Usuarios />,
        document.getElementById('content-Usuarios')
);
 ReactDOM.render(
        <Clientes />,
        document.getElementById('content-Clientes')
);
$(".form_datetime").datetimepicker({language:'es', format: 'dd-mm-yyyy', autoclose: true, startView: 2, minView: 2, maxView: 2});