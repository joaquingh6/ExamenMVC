
				<div class="box-body">
					<div class="row">
					<div class="col-md-7">


					<div class="form-group">
						<label for="exampleInputEmail1">Name</label>
						<input type="name" value="<?=(isset($post->name))?$post->name:"";?>" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label >Excerpt</label>
						<input  value="<?=(isset($post->excerpt))?$post->excerpt:"";?>" type="name" name="excerpt" class="form-control">
					</div>
					<div class="form-group">
						<label >body</label>
						<textarea name="body" class="form-control"> <?=(isset($post->body))?$post->body:"";?></textarea>
					</div>
					
					<div class="form-group">
						<label>File input</label>
						<input name="file" type="file" id="exampleInputFile">
					</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">

					<label>Tags</label>
					<br>

					<?php if (isset($post->tags_id)) {
						$tags_id = explode(',' , $post->tags_id);
					}else{
						$tags_id = [];
					} ?>
					<?php foreach ($tags as $tag ): ?>

						<label>
							<input <?=(in_array($tag->id, $tags_id))? 'checked':'' ;?>  type="checkbox" id="<?= $tag->id ?>" name="tags[]" class="flat-red" value="<?= $tag->id ?>" >
							<?= $tag->name ?>
						</label>
						
					<?php endforeach ?>

				</div>

				<div class="form-group">
                <label>Categories</label>
                <select name="category" class="form-control select1" style="width: 100%;">
                  <?php foreach ($categories as $category): ?>

                  	 <option value="<?= $category->id ?>" <?= (isset($post->id) && $category->id == $post->id)? 'selected': '' ;?>> <?= $category->name ?></option>

                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>STATUS</label>
                <select name="status" class="form-control select1" style="width: 100%;">                 
                  	 <option value="PUBLISHED" <?= (isset($post->status) && $post->status == "PUBLISHED")? 'selected' : '' ; ?>>PUBLISHED</option>
                  	 <option value="DRAFT"<?= (isset($post->status) && $post->status == "DRAFT")? 'selected' : '' ; ?>>DRAFT</option>
                </select>
              </div>
              <?php if (isset($post->file)):?>
              	<div class="form-group">
              	<img style="height: 9em;" src="<?= $post->file ?>" class="img-responsive" alt="...">
              </div>
              <?php endif; ?>
			</div>
			</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>

			