
'''<summary>
''' A generealization of an item with a <c>Description</c> and <c>Title</c>.
''' Any implmentation of IItem can be rendered using the ItemListView and ItemDescriptionView types.
'''</summary>
Public Interface IItem
    
    ReadOnly Property Title() As String
    ReadOnly Property Description() As String

End Interface