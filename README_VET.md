# Proyecto: Mi Veterinaria

## Cargar a repositorio

1. Crear una nueva rama 
> la sintaxis que venimos usando es 'feature/{nombre-de-rama}', siendo el nombre alusivo al contenido del commit, pero no es algo crucial solo es buena practica

2. Hacer commit(s) en la rama creada
3. Hacer merge de la rama creada:
    1. Asegurarse de haber hecho commit de todo
    2. Cambiar a la rama 'develop'
    3. *Actualizar develop*
    4. Volver a la rama en la que hice commit(s)
    5. Hacer el **merge** de la rama **en develop**
    *Esto es importante porque asi aparecen los conflictos que se deben resolver antes de publicar*

    > Para hacer el merge nosotras usamos la extension 'Git Graph'
    
4. Publicar la rama y aceptar el pull request en GitHub
5. Asegurarse de que lo subido se está comparando/se va a publicar en la rama 'develop' y no en main o en master

## Organizacion de views

**create:** views para cargar/crear/dar de alta
**display:** views para mostrar
**edit:** views para formularios de edición
**remove:** views para eliminar/dar de baja
**layouts:** views que se reusan


## Crear contenido de página
Usar siempre este contenedor para no tener problema !!

<div class="col vw-100">
    <!-- ... -->
</div>

> ¿Por qué? Porque la vista « menu » abre un <div class="row"> que se cierra en el footer para no tener problema




